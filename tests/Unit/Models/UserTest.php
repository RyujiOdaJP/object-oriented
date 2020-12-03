<?php

namespace Tests\Unit\Models;

use App\Models\User;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertTrue;

class UserTest extends TestCase
{
    /**
     *
     *| パターン | レッスンの<br/>残り予約可能枠数 | ユーザーの<br/>プラン | ユーザーの<br/>当月予約数 | 予約の可否 |
     * |------|--------------------|---------------|-----------------|-------|
     * | 1    | > 1                | レギュラー         | < 5             | 可     |
     * | 2    | > 1                | レギュラー         | 5               | 否     |
     * | 3    | 0                  | レギュラー         | -               | 否     |
     * | 4    | > 1                | ゴールド          | -               | 可     |
     * | 5    | 0                  | ゴールド          | -               | 否     |
     */

    public function testCanReserve()
    {
        $user = new User();

        // pattern 1
        $user->plan = 'regular';
        $remainingCount = 1;
        $reservationCount = 4; //既存予約数
        assertTrue($user->canReserve($remainingCount, $reservationCount));

        // pattern 2
        $user->plan = 'regular';
        $remainingCount = 1;
        $reservationCount = 5; //既存予約数
        assertFalse($user->canReserve($remainingCount, $reservationCount));

        // pattern 3
        $user->plan = 'regular';
        $remainingCount = 0;
        assertFalse($user->canReserve($remainingCount));

        // pattern 4
        $user->plan = 'gold';
        $remainingCount = 1;
        $reservationCount = 4; //既存予約数
        assertTrue($user->canReserve($remainingCount, $reservationCount));

        // pattern 5
        $user->plan = 'gold';
        $remainingCount = 0;
        $reservationCount = 4; //既存予約数
        assertFalse($user->canReserve($remainingCount, $reservationCount));

    }
}
