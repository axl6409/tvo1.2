<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TaggableTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateTags()
    {
        Post::create(['user_id' => '1','category_id' => '5','title' => 'Titre du guide 6','slug' => 'titre-du-guide-6','content' => 'lorem ipsum dolor sit amet consectur']);
        $post->saveTags('armes,armures,revolver');
        $this->assertEquals(3, Tag::count());
    }
}
