<?php

namespace App\Traits;

trait HasSessionError
{
    public function hasSessionError(): bool
    {
        return session()->has('errors');
    }

    public function getSessionError()
    {
        foreach (session('errors') as $key => $error) {
            $this->addError($key, ucfirst($error));
        }

        return $this;
    }
}
