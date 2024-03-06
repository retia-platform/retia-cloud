<?php

namespace App\Interfaces;

interface APIContract
{
    public function getId(): string|int;

    public function toArray(): array;

    public static function synth(array $value): self;
}
