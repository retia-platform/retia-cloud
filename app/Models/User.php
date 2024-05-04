<?php

namespace App\Models;

use App\Interfaces\Synthable;
use App\Traits\HasProfilePhoto;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Synthable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasRoles;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'retia_api_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'retia_api_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role(): Attribute
    {
        return Attribute::get(fn () => Role::findByName($this->getRoleNames()->first()) ?? Role::findByName('Technician'));
    }

    public function isSuperAdministrator(): bool
    {
        return $this->hasRole(\App\Enums\User\Role::SUPER_ADMINISTRATOR->label());
    }

    public function isAdministrator(): bool
    {
        return $this->hasRole(\App\Enums\User\Role::ADMINISTRATOR->label());
    }

    public function isTechnician(): bool
    {
        return $this->hasRole(\App\Enums\User\Role::TECHNICIAN->label());
    }

    public function refreshRetiaApiToken(): self
    {
        return $this->createRetiaApiToken();
    }

    public function createRetiaApiToken(): self
    {
        $retiaApiToken = Http::post(config('services.retia_api.url').'api/token', [
            'username' => config('services.retia_api.username'),
            'password' => config('services.retia_api.password'),
        ])->json();

        if (empty($retiaApiToken) || empty($retiaApiToken['access'])) {
            Log::error($message = 'Failed to refresh Retia API token!');

            return redirect(route('login'))->withErrors(['retia_api' => $message]);
        }

        $this->update([
            'retia_api_token' => $retiaApiToken['access'],
        ]);

        return $this->fresh();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'two_factor_recovery_codes' => $this->two_factor_recovery_codes,
            'two_factor_secret' => $this->two_factor_secret,
            'retia_api_token' => $this->retia_api_token,
            'remember_token' => $this->remember_token,
        ];
    }

    public static function synth(array $value): self
    {
        return new self([
            'id' => $value['id'],
            'name' => $value['name'],
            'email' => $value['email'],
            'password' => $value['password'],
            'two_factor_recovery_codes' => $value['two_factor_recovery_codes'],
            'two_factor_secret' => $value['two_factor_secret'],
            'retia_api_token' => $value['retia_api_token'],
            'remember_token' => $value['remember_token'],
        ]);
    }
}
