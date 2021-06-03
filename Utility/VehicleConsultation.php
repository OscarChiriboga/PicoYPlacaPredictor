<?php
require_once('Vehicle.php');

class VehicleConsultation
{
  private string $date;
  private string $time;
  private Vehicle $vehicle;

  public function __construct(string $date,string $time,string $plateNumber)
  {
      if(!$this->validateDate($date)){throw new Exception('Please choose a valid date');}
      if(!$this->validateDate($time,'H:i:s')){throw new Exception('Please choose a valid time');}
      $this->vehicle=new Vehicle($plateNumber);
      $this->date=$date;
      $this->time=$time;
  }

  public function getDate(){
    return $this->date;
  }

  public function getTime(){
    return $this->time;
  }

  public function getVehicle(){
    return $this->vehicle;
  }

  public static function getUnixTime($time){
    return strtotime($time);
  }

  public function getDayBasedOnDate(){
    $timestamp = strtotime($this->date);
    $day = date('l', $timestamp);
    return $day;
  }

  private function validateDate(string $date,string $format = 'Y-m-d'){
    $dateCheck = DateTime::createFromFormat($format, $date);
    return $dateCheck && $dateCheck->format($format) === $date;
  }
}
?>
