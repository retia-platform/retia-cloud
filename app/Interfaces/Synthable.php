<?php

namespace App\Interfaces;

interface Synthable
{
    public static function synth(array $value): self;

    public function toArray(): array;
}
