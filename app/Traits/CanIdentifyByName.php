<?php

namespace App\Traits;

trait CanIdentifyByName
{
    public function getId(): string|int
    {
        return $this->name;
    }
}
