<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Notification::class)
            ->assertStatus(200);
    }
}
