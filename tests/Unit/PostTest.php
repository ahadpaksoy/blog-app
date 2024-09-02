<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase; // This trait will roll back database changes after each test

    /** @test */
    public function it_creates_a_post()
    {
        $response = $this->post('/posts', [
            'title' => 'Sample Post',
            'content' => 'This is a sample post content.',
        ]);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', [
            'title' => 'Sample Post',
        ]);
    }

    /** @test */
    public function it_updates_a_post()
    {
        $post = Post::create([
            'title' => 'Original Title',
            'content' => 'Original content.',
        ]);

        $response = $this->put("/posts/{$post->id}", [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ]);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', [
            'title' => 'Updated Title',
        ]);
        $this->assertDatabaseMissing('posts', [
            'title' => 'Original Title',
        ]);
    }

    /** @test */
    public function it_deletes_a_post()
    {
        $post = Post::create([
            'title' => 'Post to be deleted',
            'content' => 'Content of the post to be deleted.',
        ]);

        $response = $this->delete("/posts/{$post->id}");

        $response->assertRedirect('/posts');
        $this->assertDatabaseMissing('posts', [
            'title' => 'Post to be deleted',
        ]);
    }
}
