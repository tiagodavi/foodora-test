<?php

namespace Application\Models;

use \PDO;

class VendorScheduleDao
{
  private $conn;

  public function __construct()
  {
    $this->conn = Connection::getInstance();
  }
  public function insertVendorSpecialDays($days)
  {
    foreach($days as $VendorSpecialDay) {

      $params = array(
        'vendor_id'  => $VendorSpecialDay->getVendorId(),
        'week_day'   => $VendorSpecialDay->getSpecialDateNumber(),
        'all_day'    => $VendorSpecialDay->getAllDay(),
        'start_hour' => $VendorSpecialDay->getStartHour(),
        'stop_hour'  => $VendorSpecialDay->getStopHour()
      );

      $VendorSchedule = $this->findOneBy($params);

      if(empty($VendorSchedule)) {

        $VendorSchedule = new VendorSchedule($params);

        $this->insert($VendorSchedule);
      }
    }
  }
  private function insert(VendorSchedule $VendorSchedule)
  {
    $this->conn->beginTransaction();

    try {

      $statement = $this->conn->prepare(
        'INSERT INTO vendor_schedule
        (vendor_id, week_day, all_day, start_hour, stop_hour) VALUES
        (:vendor_id, :week_day, :all_day, :start_hour, :stop_hour)'
      );

      $statement->bindValue(':vendor_id', $VendorSchedule->getVendorId());
      $statement->bindValue(':all_day',   $VendorSchedule->getAllDay());
      $statement->bindValue(':week_day',  $VendorSchedule->getWeekDay());
      $statement->bindValue(':start_hour',$VendorSchedule->getStartHour());
      $statement->bindValue(':stop_hour', $VendorSchedule->getStopHour());

      $statement->execute();

      $this->conn->commit();

      return true;
    }
    catch(Exception $e) {
        $this->conn->rollback();
    }

    return false;
  }
  private function findOneBy($params)
  {
    $statement = $this->conn->prepare(
      'SELECT * FROM vendor_schedule
       WHERE vendor_id = :vendor_id AND
       week_day = :week_day AND
       start_hour = :start_hour AND
       stop_hour  = :stop_hour
       LIMIT 1'
    );

    $statement->bindValue(':vendor_id',  $params['vendor_id']);
    $statement->bindValue(':week_day',   $params['week_day']);
    $statement->bindValue(':start_hour', $params['start_hour']);
    $statement->bindValue(':stop_hour',  $params['stop_hour']);
    $statement->execute();

    return $this->processResults($statement);
  }
  private function processResults($statement)
  {
    $results = array();

    if($statement) {
      while($row = $statement->fetch(PDO::FETCH_OBJ)) {

        $VendorSchedule = new VendorSchedule($row);

        $results[] = $VendorSchedule;
      }
    }

    return $results;
  }
}
