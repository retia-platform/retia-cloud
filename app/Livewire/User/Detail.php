<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\HasSessionError;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Detail extends Component
{
    use HasSessionError;

    public User $user;

    public function mount(UserRepository $userRepository)
    {
        $this->user = $userRepository->getUser(request()->input('id'));

        if (empty($this->user)) {
            throw new NotFoundHttpException();
        }
    }

    public function render()
    {
        return view('livewire.user.detail');
    }
}
