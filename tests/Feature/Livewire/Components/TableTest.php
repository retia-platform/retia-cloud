<?php

namespace Tests\Feature\Livewire\Components;

use App\Livewire\Components\Table;
use Livewire\Livewire;
use Tests\TestCase;

class TableTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Table::class)
            ->assertStatus(200);
    }
}
