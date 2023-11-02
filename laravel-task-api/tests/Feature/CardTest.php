<?php

namespace Tests\Feature;

use App\Models\Board;
use App\Models\Card;
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

    /** @test new cards will be ordered */
    public function new_cards_will_be_ordered()
    {
        $user = User::factory()->create();
        $board = Board::factory()->for($user)->create();

        $card1 = Card::factory()->for($board)->create();
        $card2 = Card::factory()->for($board)->create();
        $card3 = Card::factory()->for($board)->create();

        $this->assertEquals(1, $card1->order_column);
        $this->assertEquals(2, $card2->order_column);
        $this->assertEquals(3, $card3->order_column);
    }

    /** @test user can reorder their cards */
    public function user_can_reorder_their_cards()
    {
        $user = User::factory()->create();
        $board = Board::factory()->for($user)->create();
        $card1 = Card::factory()->for($board)->create();
        $card2 = Card::factory()->for($board)->create();
        $card3 = Card::factory()->for($board)->create();

        Card::setNewOrder([2, 3, 1]);

        $this->assertEquals(1, $card2->fresh()->order_column);
        $this->assertEquals(2, $card3->fresh()->order_column);
        $this->assertEquals(3, $card1->fresh()->order_column);
    }

    /** @test each board has its own card order */
    public function each_board_has_its_own_card_order()
    {
        $user = User::factory()->create();
        $board1 = Board::factory()->for($user)->create();
        $board2 = Board::factory()->for($user)->create();
        $card1 = Card::factory()->for($board1)->create();
        $card2 = Card::factory()->for($board1)->create();
        $card3 = Card::factory()->for($board2)->create();
        $card4 = Card::factory()->for($board2)->create();

        Card::setNewOrder([4, 3]);

        $this->assertEquals(1, $card1->fresh()->order_column);
        $this->assertEquals(2, $card2->fresh()->order_column);
        $this->assertEquals(1, $card4->fresh()->order_column);
        $this->assertEquals(2, $card3->fresh()->order_column);
    }
}
