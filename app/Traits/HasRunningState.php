<?php

namespace App\Traits;

trait HasRunningState
{
    public bool $running = false;

    public function isRunning(): bool
    {
        return $this->running;
    }
}
