<?php

use PHPUnit_Framework_TestCase as PHPUnit;
use Application\Models\WeekDay;

class WeekDayTest extends PHPUnit
{
  public function testWeekNumber()
  {
    $sunday_date   = '2016-06-05';
    $sunday_number = 7;

    $monday_date   = '2016-06-06';
    $monday_number = 1;

    $this->assertEquals(
      $sunday_number,
      WeekDay::getWeekNumber($sunday_date),
      'This date number is not correct'
    );

    $this->assertEquals(
      $monday_number,
      WeekDay::getWeekNumber($monday_date),
      'This date number is not correct'
    );
  }
}
