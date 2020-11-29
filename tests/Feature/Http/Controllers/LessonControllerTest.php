<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
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
     */
    public function testExample():void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @note レッスンが予約可能最大数と現在の予約数を保持しており、その差が空き状況レベルの初期値となる感じです。
     * @param $capacity
     * @param $reservationCount
     * @param $expectedVacancyLevelMark
     * @dataProvider dataShow
     * @return void
     */
    public function testShow(int $capacity, int $reservationCount, string $expectedVacancyLevelMark): void
    {
        $lesson = Lesson::factory()->create(['name' => '楽しいヨガレッスン', 'capacity' => $capacity]);
        for ($i = 0; $i < $reservationCount; $i++) {
            $user = User::factory()->create();
            $reservation = Reservation::factory()->create(['user_id' => $user, 'lesson_id' => $lesson]);
        }
        $response = $this->get("/lessons/{$lesson->id}");
        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee($lesson->name);
        $response->assertSee("空き状況: {$expectedVacancyLevelMark}");
    }

    public function dataShow()
    {
        return [
            'enough' => [
                'capacity' => 10,
                'reservationCount' => 3,
                'expectedVacancyLevelMark' => '○'
            ],
            'few' => [
                'capacity' => 5,
                'reservationCount' => 3,
                'expectedVacancyLevelMark' => '△'
            ],
            'full' => [
                'capacity' => 3,
                'reservationCount' => 3,
                'expectedVacancyLevelMark' => '×'
            ]
        ];
    }
}
