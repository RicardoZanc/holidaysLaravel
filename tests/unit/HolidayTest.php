<?php
namespace Tests;

use App\Http\Controllers\HolidayController;
use PHPUnit\Framework\TestCase;

class HolidayTest extends TestCase {

    public function testFormatDate(){
        $controller = new HolidayController();
        $dateToConvert = "2024-02-01";
        $convertedDate = $controller->formatDate($dateToConvert);
        $this->assertEquals("01/02/2024", $convertedDate);
    }

}
