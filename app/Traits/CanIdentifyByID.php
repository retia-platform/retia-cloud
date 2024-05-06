<?php

namespace App\Traits;

trait CanIdentifyByID
{
    public function getId(): string|int
    {
        return $this->id;
    }
}
