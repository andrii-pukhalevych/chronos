<?php
declare(strict_types=1);

/**
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @copyright     Copyright (c) Brian Nesbitt <brian@nesbot.com>
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Cake\Chronos\Test\TestCase\Interval;

use Cake\Chronos\Chronos;
use Cake\Chronos\ChronosInterval;
use Cake\Chronos\Test\TestCase\TestCase;
use DateInterval;

class IntervalConstructTest extends TestCase
{
    public function testDefaults()
    {
        $ci = new ChronosInterval();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 1, 0, 0, 0, 0, 0);
    }

    public function testNulls()
    {
        $ci = new ChronosInterval(null, null, null, null, null, null, null);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 0);

        $ci = ChronosInterval::days(null);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 0);
    }

    public function testZeroes()
    {
        $ci = new ChronosInterval(0, 0, 0, 0, 0, 0, 0);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 0);

        $ci = ChronosInterval::days(0);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 0);
    }

    public function testZeroesChained()
    {
        $ci = ChronosInterval::days(0)->week(0)->minutes(0);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 0);
    }

    public function testYears()
    {
        $ci = new ChronosInterval(1);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 1, 0, 0, 0, 0, 0, 0);

        $ci = ChronosInterval::years(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 2, 0, 0, 0, 0, 0, 0);

        $ci = ChronosInterval::year();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 1, 0, 0, 0, 0, 0, 0);

        $ci = ChronosInterval::year(3);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 3, 0, 0, 0, 0, 0, 0);
    }

    public function testMonths()
    {
        $ci = new ChronosInterval(0, 1);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 1, 0, 0, 0, 0, 0);

        $ci = ChronosInterval::months(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 2, 0, 0, 0, 0, 0);

        $ci = ChronosInterval::month();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 1, 0, 0, 0, 0, 0);

        $ci = ChronosInterval::month(3);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 3, 0, 0, 0, 0, 0);
    }

    public function testWeeks()
    {
        $ci = new ChronosInterval(0, 0, 1);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 7, 0, 0, 0, 0);

        $ci = ChronosInterval::weeks(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 14, 0, 0, 0, 0);

        $ci = ChronosInterval::week();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 7, 0, 0, 0, 0);

        $ci = ChronosInterval::week(3);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 21, 0, 0, 0, 0);
    }

    public function testDays()
    {
        $ci = new ChronosInterval(0, 0, 0, 1);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 1, 0, 0, 0, 0);

        $ci = ChronosInterval::days(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 2, 0, 0, 0, 0);

        $ci = ChronosInterval::dayz(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 2, 0, 0, 0, 0);

        $ci = ChronosInterval::day();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 1, 0, 0, 0, 0);

        $ci = ChronosInterval::day(3);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 3, 0, 0, 0, 0);
    }

    public function testHours()
    {
        $ci = new ChronosInterval(0, 0, 0, 0, 1);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 1, 0, 0, 0);

        $ci = ChronosInterval::hours(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 2, 0, 0, 0);

        $ci = ChronosInterval::hour();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 1, 0, 0, 0);

        $ci = ChronosInterval::hour(3);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 3, 0, 0, 0);
    }

    public function testMinutes()
    {
        $ci = new ChronosInterval(0, 0, 0, 0, 0, 1);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 1, 0, 0);

        $ci = ChronosInterval::minutes(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 2, 0, 0);

        $ci = ChronosInterval::minute();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 1, 0, 0);

        $ci = ChronosInterval::minute(3);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 3, 0, 0);
    }

    public function testSeconds()
    {
        $ci = new ChronosInterval(0, 0, 0, 0, 0, 0, 1);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 1, 0);

        $ci = ChronosInterval::seconds(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 2, 0);

        $ci = ChronosInterval::second();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 1, 0);

        $ci = ChronosInterval::second(3);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 3, 0);
    }

    public function testMicroseconds()
    {
        $ci = new ChronosInterval(0, 0, 0, 0, 0, 0, 0, 123456);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 123456);

        $ci = ChronosInterval::microseconds(2);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 2);

        $ci = ChronosInterval::microsecond();
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 1);

        $ci = ChronosInterval::microsecond(3);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 0, 0, 0, 0, 0, 0, 3);
    }

    public function testYearsAndHours()
    {
        $ci = new ChronosInterval(5, 0, 0, 0, 3, 0, 0, 0);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 5, 0, 0, 3, 0, 0, 0);
    }

    public function testAll()
    {
        $ci = new ChronosInterval(5, 6, 2, 5, 9, 10, 11, 123);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 5, 6, 19, 9, 10, 11, 123);
    }

    public function testAllWithCreate()
    {
        $ci = ChronosInterval::create(5, 6, 2, 5, 9, 10, 11, 123);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 5, 6, 19, 9, 10, 11, 123);
    }

    public function testInstance()
    {
        $ci = ChronosInterval::instance(new DateInterval('P2Y1M5DT22H33M44S'));
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 2, 1, 5, 22, 33, 44, 0);
        $this->assertTrue($ci->days === false || $ci->days === 0 || $ci->days === ChronosInterval::PHP_DAYS_FALSE);
    }

    public function testInstanceWithNegativeDateInterval()
    {
        $di = new DateInterval('P2Y1M5DT22H33M44S');
        $di->invert = 1;
        $ci = ChronosInterval::instance($di);
        $this->assertInstanceOf(ChronosInterval::class, $ci);
        $this->assertDateTimeInterval($ci, 2, 1, 5, 22, 33, 44, 0);
        $this->assertTrue($ci->days === false || $ci->days === 0 || $ci->days === ChronosInterval::PHP_DAYS_FALSE);
        $this->assertSame(1, $ci->invert);
    }

    public function testInstanceWithDaysThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $ci = ChronosInterval::instance(Chronos::now()->diff(Chronos::now()->addWeeks(3)));
    }
}
