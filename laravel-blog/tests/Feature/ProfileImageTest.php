<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProfileImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test it deletes previous profile image */
    public function it_deletes_previous_profile_image()
    {
        $user = User::factory()->create();
        $this->be($user);
        Storage::fake('public');
        $firstImage = UploadedFile::fake()->image('first.jpg');
        $secondImage = UploadedFile::fake()->image('second.jpg');

        $this->updateProfileWithImage($user, $firstImage);

        Storage::disk('public')->assertExists('image/' . $firstImage->hashName());

        $this->updateProfileWithImage($user, $secondImage);

        Storage::disk('public')->assertMissing('image/' . $firstImage->hashName());
        Storage::disk('public')->assertExists('image/' . $secondImage->hashName());
    }

    protected function updateProfileWithImage($user, $image)
    {
        $response = $this->patch('/profile', [
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'title' => $user->title,
            'image' => $image,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status', 'profile-updated');
    }
}
