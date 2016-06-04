<?php
date_default_timezone_set('America/Sao_Paulo');

require_once('vendor/autoload.php');

use Application\Models\VendorScheduleDao;
use Application\Models\VendorSpecialDayDao;

$VendorSpecialDayDao = new VendorSpecialDayDao();
$vendorSpecialDays = $VendorSpecialDayDao->findByEventType('opened');

$VendorScheduleDao = new VendorScheduleDao();
$VendorScheduleDao->insertVendorSpecialDays($vendorSpecialDays);

echo "Run Successfully \n";


