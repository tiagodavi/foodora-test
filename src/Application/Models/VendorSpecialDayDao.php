<?php

namespace Application\Models;

use \PDO;

class VendorSpecialDayDao
{
  private $conn;

  public function __construct()
  {
    $this->conn = Connection::getInstance();
  }
  public function findByEventType($type)
  {
    $statement = $this->conn->prepare(
      'SELECT * FROM vendor_special_day WHERE event_type = :type'
    );

    $statement->bindValue(':type', $type);
    $statement->execute();

    return $this->processResults($statement);
  }
  private function processResults($statement)
  {
    $results = array();

    if($statement) {

      while($row = $statement->fetch(PDO::FETCH_OBJ)) {

        $VendorSpecialDay = new VendorSpecialDay($row);

        $results[] = $VendorSpecialDay;
      }

    }

    return $results;
  }
}
