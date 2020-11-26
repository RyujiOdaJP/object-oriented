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
     * @dataProvider dataMark
     * @note dataProviderはテストパターンを配列で定義し、テストメソッドに順に渡してテストを行うことができます
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

    //文字列の出し分けは以下のルールです（記号と同じ）。
//
//- 残り枠数 0 = empty
//- 残り枠数 1 以上 5 未満 = few
//- 残り枠数が 5 以上 = enough
//
//テストケースとして、
//
//- empty になるパターン: 空きなし
//- few になるパターン: 残りわずか
//- enough になるパターン: 空き十分
//
//の3パターンを用意してください。

    /**
     * @dataProvider dataSlug
     * @param string $expectedSlug
     * @param int $remainingCount
     */
    public function testSlug(string $expectedSlug, int $remainingCount)
    {
        $level = new VacancyLevel($remainingCount);
        $this->assertSame($expectedSlug, $level->slug());
    }

    public function dataSlug(): array
    {
        return [
            'empty' => [
                'expectedSlug' => 'empty',
                'remainingCount' => 0
            ],
            'few' => [
                'expectedSlug' => 'few',
                'remainingCount' => 4
            ],
            'enough' => [
                'expectedSlug' => 'enough',
                'remainingCount' => 5
            ]
        ];
    }

}
