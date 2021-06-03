<?php
use PHPUnit\Framework\TestCase;

class PYPTest extends TestCase
{
  public function testCheckIfCanDriveWhenVehicleCannotDriveDueToDayAndTimeRestriction(){
    $vConsult=new VehicleConsultation('2021-06-04','07:30','PDN-369');
    $this->assertTrue(strpos(PicoYPlacaPredictor::checkIfCanDrive($vConsult),'cannot')==true);
  }

  public function testCheckIfCanDriveWhenVehicleCanDriveBecauseRestrictionDayDiffersFromInputDate(){
    $vConsult=new VehicleConsultation('2021-06-03','17:30','PDN-3869');
    $this->assertTrue(strpos(PicoYPlacaPredictor::checkIfCanDrive($vConsult),'can be')==true);
  }

  public function testCheckIfCanDriveWhenVehicleCanDriveAndDayRestrictionMatchesButTimeRestricionNot(){
    $vConsult=new VehicleConsultation('2021-06-04','15:59','PDN-3869');
    $this->assertTrue(strpos(PicoYPlacaPredictor::checkIfCanDrive($vConsult),'can be')==true);
  }

}

?>
