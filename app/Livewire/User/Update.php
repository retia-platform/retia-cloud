<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\HasSessionError;
use Illuminate\Support\Str;
use Livewire\Component;

class Update extends Component
{
    use HasSessionError;

    public User $user;

    public string $role;

    public string $password = '';

    public function update()
    {
        //
    }

    public function updatePassword()
    {
        //
    }

    public function mount(UserRepository $userRepository)
    {
        $this->user = $userRepository->getUser(request()->input('id'));
        $this->role = Str::lower($this->user->role->name);
    }

    public function render()
    {
        return view('livewire.user.update');
    }
}
