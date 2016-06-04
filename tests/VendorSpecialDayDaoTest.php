<?php

use PHPUnit_Framework_TestCase as PHPUnit;
use Application\Models\VendorSpecialDayDao;
use Application\Models\Connection;

class VendorSpecialDayDaoTest extends PHPUnit
{
  public function testFindByEventType()
  {
    $pdo = Connection::getInstance();

    $sql = "SELECT count(*) FROM
    `vendor_special_day` WHERE event_type = 'opened'";

    $result = $pdo->prepare($sql);
    $result->execute();

    $numberOfRows = (int)$result->fetchColumn();

    $VendorSpecialDayDao = new VendorSpecialDayDao();
    $vendorSpecialDays   = $VendorSpecialDayDao->findByEventType(
      'opened'
    );

    $this->assertEquals(
      $numberOfRows,
      count($vendorSpecialDays),
      'The result is wrong'
    );
  }
  public function testFindByEventTypeEmpty()
  {
    $VendorSpecialDayDao = new VendorSpecialDayDao();
    $vendorSpecialDays   = $VendorSpecialDayDao->findByEventType(
      'wrong'
    );

    $this->assertEquals(
      0,
      count($vendorSpecialDays),
      'The statement is not empty'
    );
  }
}
