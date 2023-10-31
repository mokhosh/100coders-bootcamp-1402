<?php

namespace Tests\Feature;

use App\Models\Board;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardTest extends TestCase
{
    use RefreshDatabase;

    /** @test user can create a card */
    public function user_can_create_a_card()
    {
        $user = User::factory()->create();
        $this->be($user);
        $board = Board::factory()->for($user)->create();

        $response = $this->postJson("board/{$board->id}/card", [
            'title' => 'Card Title',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('cards', [
            'title' => 'Card Title',
            'board_id' => $board->id,
        ]);
    }

    // test user cannot create cards on other users' boards
    // test title is required for creating a card
    // test guest cannot create cards
}
