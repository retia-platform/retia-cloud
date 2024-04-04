<?php

namespace App\Traits;

use ReflectionEnum;

trait HasFilterFromEnum
{
    public function populateFilters(array $enums)
    {
        foreach ($enums as $key => $enum) {
            $enum = new ReflectionEnum($enum);
            foreach ($enum->getConstants() as $constant) {
                $this->filters[$key][$constant->value] = false;
            }
        }
    }

    public function populateFilterFromEnum(string $name, array $enums)
    {
        $values = [];

        foreach ($enums as $key => $enum) {
            $values[$enum->value] = false;
        }

        $this->filters[$name] = $values;
    }
}
