<?php

namespace App\Interfaces;

interface APIContract
{
    public function save(): self;

    public function delete(): void;

    public function refresh(): void;

    public function toArray(): array;
}
