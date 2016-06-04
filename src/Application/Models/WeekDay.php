<?php

namespace Application\Models;

class WeekDay
{
  public static function getWeekNumber($date)
  {
    $sunday = 7;
    $day    = date('w', strtotime($date));
    if($day == 0){
      $day = $sunday;
    }
    return (int)$day;
  }
}
