<?php

use PHPUnit_Framework_TestCase as PHPUnit;
use Application\Models\VendorScheduleDao;
use Application\Models\VendorSpecialDay;
use Application\Models\Connection;

class VendorScheduleDaoTest extends PHPUnit
{
  public function restoreDataBase()
  {
    $contents = file_get_contents('./restore.sh');
    shell_exec($contents);
  }
  public function getTotalSchedules()
  {
    $pdo = Connection::getInstance();

    $sql = "SELECT count(*) FROM `vendor_schedule`";

    $result = $pdo->prepare($sql);
    $result->execute();

    return (int) $result->fetchColumn();
  }
  public function testInsertVendorSpecialDays()
  {
    $this->restoreDataBase();

    $numberOfRows = $this->getTotalSchedules();

    $params = array(
      'vendor_id'    => 1,
      'special_date' => '2017-01-01',
      'event_type'   => 'opened',
      'all_day'      => 0,
      'start_hour'   => '06:00:00',
      'stop_hour'    => '10:00:00'
     );

    $VendorSpecialDay = new VendorSpecialDay($params);

    $VendorScheduleDao = new VendorScheduleDao();
    $VendorScheduleDao->insertVendorSpecialDays(array($VendorSpecialDay));

    $this->assertEquals(
      $numberOfRows + 1,
      $this->getTotalSchedules(),
      'The result is wrong'
    );

    $this->restoreDataBase();
  }
}
