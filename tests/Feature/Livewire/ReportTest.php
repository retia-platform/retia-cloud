<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Report::class)
            ->assertStatus(200);
    }
}
