<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use App\Models\Lesson as Lesson;

class LessonControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     * @dataProvider remainingCount
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * @note レッスンが予約可能最大数と現在の予約数を保持しており、その差が空き状況レベルの初期値となる感じです。
     *
     */
    public function testShow()
    {
        $lesson = Lesson::factory()->create(['name' => '楽しいヨガレッスン']);
        $response = $this->get("/lessons/{$lesson->id}");
        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee($lesson->name);
        $response->assertSee('空き状況: ×');
    }

    public function remainingCount ()
    {

    }
}
