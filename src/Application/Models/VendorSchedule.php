<?php

namespace Application\Models;

class VendorSchedule
{
  private $id;
  private $vendor_id;
  private $week_day;
  private $all_day;
  private $start_hour;
  private $stop_hour;

  public function __construct($object)
  {
    foreach($object as $property => $value){
      $this->$property = $value;
    }
  }
  public function getVendorId()
  {
    return $this->vendor_id;
  }
  public function getWeekDay()
  {
    return $this->week_day;
  }
  public function getAllDay()
  {
    return $this->all_day;
  }
  public function getStartHour()
  {
    return $this->start_hour;
  }
  public function getStopHour()
  {
    return $this->stop_hour;
  }
}
