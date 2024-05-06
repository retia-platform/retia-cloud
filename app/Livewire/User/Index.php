<?php

namespace App\Livewire\User;

use App\Enums\User\Role;
use App\Exports\UserExport;
use App\Interfaces\TableComponent;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\HasFilterFromEnum;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Index extends Component implements TableComponent
{
    use HasFilterFromEnum;

    public array $filterEnums = [
        'roles' => Role::class,
    ];

    public array $filters;

    private Collection $users;

    public static function getTableColumns(): array
    {
        return [
            'Photo',
            'Name',
            'Email',
            'Role',
            'Created At',
        ];
    }

    public function getTableData(): array
    {
        return [
            'title' => 'User',
            'detailRoute' => 'users.detail',
            'storeRoute' => 'users.store',
            'updateRoute' => 'users.update',
            'actionable' => true,
            'deleteable' => true,
            'exportable' => true,
            'paginate' => true,
            'columns' => collect(self::getTableColumns()),
            'items' => $this->getTableItems(),
        ];
    }

    public function getTableItems(): Collection
    {
        return $this->users->map(function (User $user) {
            return [
                $user->getId(),
                '<img src="'.$user->profilePhotoUrl.'" alt="'.$user->name.'" class="h-8 w-8 rounded-full object-cover"/>',
                $user->name,
                $user->email,
                $user->role->name,
                $user->created_at->diffForHumans(),
            ];
        });
    }

    public function activateDefaultFilters()
    {
        foreach ($this->filters['roles'] as $key => $value) {
            $this->filters['roles'][$key] = ! $value;
        }
    }

    public function filter(UserRepository $userRepository)
    {
        $user = auth()->user();

        $this->users = match (true) {
            $user->isSuperAdministrator() => $userRepository->getAllUsers(),
            $user->isAdministrator() => $userRepository->getAdministratorAndTechnicianUsers(),
            $user->isTechnician() => $userRepository->getTechnicianUsers(),
            default => collect(),
        };

        $this->users = $this->users->filter(function (User $user) {
            return
                ($this->filters['roles']['super_administrator'] ? $user->isSuperAdministrator() : false) ||
                ($this->filters['roles']['administrator'] ? $user->isAdministrator() : false) ||
                ($this->filters['roles']['technician'] ? $user->isTechnician() : false);
        });

        $this->dispatch('table-item-updated', items: $this->getTableItems());
    }

    #[On('table-exported')]
    public function export(UserRepository $userRepository, string $fileName): Response|BinaryFileResponse
    {
        $this->filter($userRepository);

        return (new UserExport($this->users))->download($fileName);
    }

    #[On('table-item-deleted')]
    public function delete(UserRepository $userRepository, int $id)
    {
        $userRepository->deleteUser($id);
        $this->users = $this->filter($userRepository);
    }

    public function mount(UserRepository $userRepository)
    {
        $this->populateFilters($this->filterEnums);
        $this->activateDefaultFilters();
        $this->filter($userRepository);
    }

    public function render()
    {
        return view('livewire.user.index', [
            'tableData' => $this->getTableData(),
        ]);
    }
}
