<?php

namespace Application\Models;

class VendorSpecialDay
{
  private $id;
  private $vendor_id;
  private $special_date;
  private $event_type;
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
  public function getStartHour()
  {
    return $this->start_hour;
  }
  public function getStopHour()
  {
    return $this->stop_hour;
  }
  public function getAllDay()
  {
    return $this->all_day;
  }
  public function getSpecialDate()
  {
    return $this->special_date;
  }
  public function getSpecialDateNumber()
  {
    return WeekDay::getWeekNumber($this->getSpecialDate());
  }
}
