<?php
/*
Name: Oscar Chiriboga
File: PicoYPlacaPredictor.php
Description: Contains PicoYPlacaPredictor class,
which has function to check if a Vehicle can be on road or not based on date, time and the vehicle's registration type
*/
  require_once('VehicleConsultation.php');

  class PicoYPlacaPredictor
  {
    //Associative Array that contains information about the plate numbers (using its last) that cannot be on road in a certain day
    const PicoYPlacaInfo=array('Monday' => array(1,2),'Tuesday' => array(3,4),'Wednesday' => array(5,6),'Thursday' => array(7,8),'Friday' => array(9,0));

    public static function checkIfCanDrive(VehicleConsultation $vConsult){
      $vehicle=$vConsult->getVehicle();
      $time=strtotime($vConsult->getTime());
      $fullDate=date('l jS \of F Y',strtotime($vConsult->getDate())).' at '.$vConsult->getTime();
      $message='Your vehicle ('.$vehicle->getPlateNumber().') can be on the road on '.$fullDate;
      if($vehicle->getRegistrationType()=='Private'){
        $day=$vConsult->getDayBasedOnDate();
        $pLastDigit=$vehicle->getPLastDigit();
        $inFirstSchedule=$time>=strtotime('07:00')&&$time<=strtotime('09:30');
        $inSecondSchedule=$time>=strtotime('16:00')&&$time<=strtotime('19:30');
        $inSchedule=$inFirstSchedule||$inSecondSchedule;
        if(array_key_exists($day,self::PicoYPlacaInfo)&&in_array($pLastDigit,self::PicoYPlacaInfo[$day])&&$inSchedule){
          $message='Your vehicle ('.$vehicle->getPlateNumber().') cannot be on the road on '.$fullDate;
        }
      }
      else{
        $message='Your vehicle ('.$vehicle->getPlateNumber().') is exempt from Pico Y Placa since it is a '.$vehicle->getRegistrationType().' vehicle';
      }
      return $message;
    }
  }
?>
