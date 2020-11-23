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

    public function testMark()
    {
        $level = new VacancyLevel(0);
        $this->assertSame('×', $level->mark());

        $level = new VacancyLevel(4);
        $this->assertSame('△', $level->mark());

        $level = new VacancyLevel(5);
        $this->assertSame('○', $level->mark());
    }
}
