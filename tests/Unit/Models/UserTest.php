<?php

namespace Tests\Unit\Models;

use App\Models\Lesson;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertTrue;

class UserTest extends TestCase
{
    /**
     * @note
     *| パターン | レッスンの<br/>残り予約可能枠数 | ユーザーの<br/>プラン | ユーザーの<br/>当月予約数 | 予約の可否 |
     * |------|--------------------|---------------|-----------------|-------|
     * | 1    | > 1                | レギュラー         | < 5             | 可     |
     * | 2    | > 1                | レギュラー         | 5               | 否     |
     * | 3    | 0                  | レギュラー         | -               | 否     |
     * | 4    | > 1                | ゴールド          | -               | 可     |
     * | 5    | 0                  | ゴールド          | -               | 否     |
     *
     * @param string $plan
     * @param int $remainingCount
     * @param int|null $reservationCount
     * @param bool $canReserve
     * @dataProvider canReserveData
     */
    public function testCanReserve(string $plan, int $remainingCount, int $reservationCount = null, bool $canReserve)
    {
        $user = new User();
        $lesson = new Lesson();

        $user->plan = $plan;
        assertSame($canReserve, $user->canReserve($remainingCount, $reservationCount));
    }

    public function canReserveData()
    {
        return [
            '予約可能：残基あり、レギュラー、空きあり' => [
                'plan' => 'regular',
                'remainingCount' => 1,
                'reservationCount' => 4,
                'canReserve' => true,
            ],
            '予約不可：残基なし、レギュラー、空きあり' => [
                'plan' => 'regular',
                'remainingCount' => 1,
                'reservationCount' => 5,
                'canReserve' => false,
            ],
            '予約不可：レギュラー、空きなし' => [
                'plan' => 'regular',
                'remainingCount' => 0,
                'reservationCount' => null,
                'canReserve' => false,
            ],
            '予約可能：ゴールド、空きあり' => [
                'plan' => 'gold',
                'remainingCount' => 1,
                'reservationCount' => null,
                'canReserve' => true,
            ],
            '予約不可：ゴールド、空きなし' => [
                'plan' => 'gold',
                'remainingCount' => 0,
                'reservationCount' => null,
                'canReserve' => false,
            ],
        ];

    }
}
