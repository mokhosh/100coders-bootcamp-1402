<?php

namespace Tests\Feature;

use App\Models\Board;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_board(): void
    {
        $user = User::factory()->create();
        $this->be($user);

        $response = $this->postJson('/board', [
            'title' => 'My Board',
            'details' => 'Something about my board.',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('boards', [
            'title' => 'My Board',
            'details' => 'Something about my board.',
            'user_id' => $user->id,
        ]);
    }

    /** @test guest cannot create a board */
    public function guest_cannot_create_a_board()
    {
        $response = $this->postJson('/board', [
            'title' => 'My Board',
            'details' => 'Something about my board.',
        ]);

        $response->assertUnauthorized();
    }

    /** @test user can create a board without details */
    public function user_can_create_a_board_without_details()
    {
        $user = User::factory()->create();
        $this->be($user);

        $response = $this->postJson('/board', [
            'title' => 'My Board',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('boards', [
            'title' => 'My Board',
        ]);
    }

    /** @test board title is required */
    public function board_title_is_required()
    {
        $user = User::factory()->create();
        $this->be($user);

        $response = $this->postJson('/board', [
            'details' => 'My Board',
        ]);

        $response->assertJsonValidationErrorFor('title');
    }

    /** @test test board title must be more than 3 chars */
    public function test_board_title_must_be_more_than_3_chars()
    {
        $user = User::factory()->create();
        $this->be($user);

        $response = $this->postJson('/board', [
            'title' => 'My',
        ]);

        $response->assertJsonValidationErrorFor('title');
    }

    /** @test user can see their own board */
    public function user_can_see_their_own_board()
    {
        $user = User::factory()->create();
        $board = Board::factory()->for($user)->create();
        $this->be($user);

        $response = $this->getJson('board/'.$board->id);

        $response->assertOk();
        $response->assertExactJson([
            'title' => $board->title,
            'details' => $board->details,
        ]);
    }

    /** @test user can update their own board */
    public function user_can_update_their_own_board()
    {
        $user = User::factory()->create();
        $board = Board::factory()->for($user)->create();
        $this->be($user);

        $response = $this->patchJson('board/'.$board->id, [
            'title' => 'New title',
        ]);

        $response->assertOk();
        $response->assertExactJson([
            'title' => 'New title',
            'details' => $board->details,
        ]);
        $this->assertDatabaseHas('boards', [
            'title' => 'New title',
        ]);
    }

    /** @test board update must be validated */
    public function board_update_must_be_validated()
    {
        $user = User::factory()->create();
        $board = Board::factory()->for($user)->create();
        $this->be($user);

        $response = $this->patchJson('board/'.$board->id, [
            'title' => 'N',
        ]);

        $response->assertJsonValidationErrorFor('title');
    }

    /** @test guest cannot update boards */
    public function guest_cannot_update_boards()
    {
        $user = User::factory()->create();
        $board = Board::factory()->for($user)->create();

        $response = $this->patchJson('board/'.$board->id, [
            'title' => 'New title',
        ]);

        $response->assertUnauthorized();
    }

    /** @test user cannot update other users boards */
    public function user_cannot_update_other_users_boards()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $board = Board::factory()->for($user1)->create();
        $this->be($user2);

        $response = $this->patchJson('board/'.$board->id, [
            'title' => 'New title',
        ]);

        $response->assertForbidden();
    }

    /** @test users can delete boards */
    public function users_can_delete_boards()
    {
        $user = User::factory()->create();
        $this->be($user);
        $board = Board::factory()->for($user)->create();

        $response = $this->deleteJson(route('board.destroy', $board));

        $response->assertOk();
        $this->assertDatabaseMissing('boards', [
            'title' => $board->title,
        ]);
    }

    /** @test users cannot delete other users boards */
    public function users_cannot_delete_other_users_boards()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $board = Board::factory()->for($user1)->create();
        $this->be($user2);

        $response = $this->deleteJson('board/'.$board->id);

        $response->assertForbidden();
    }
}
