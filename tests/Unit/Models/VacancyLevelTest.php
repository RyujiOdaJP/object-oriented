<?php

namespace Tests\Unit\Models;

use App\Models\VacancyLevel;
use PHPUnit\Framework\TestCase;

class VacancyLevelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * @dataProvider dataMark //テストパターンを配列で定義し、テストメソッドに順に渡してテストを行うことができます
     * @param string $expectedMark
     * @param int $remainingCount
     */
    public function testMark(string $expectedMark, int $remainingCount)
    {
        $level = new VacancyLevel($remainingCount);
        $this->assertSame($expectedMark, $level->mark());

    }

    public function dataMark(): array
    {
        return [
            '空きなし' => [
                'expectedMark' => '×',
                'remainingCount' => 0
            ],
            '残りわずか' => [
                'expectedMark' => '△',
                'remainingCount' => 4
            ],
            '空き十分' => [
                'expectedMark' => '○',
                'remainingCount' => 5
            ]
        ];
    }
}
