<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class LessonControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testShow ()
    {
        $response = $this->get('/lesson/1');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee('楽しいヨガレッスン');
        $response->assertSee('×');
    }
}
