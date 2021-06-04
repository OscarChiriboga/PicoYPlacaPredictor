<?php
/*
Name: Oscar Chiriboga
File: VehicleConsultation.php
Description: Contains VehicleConsultation class, which represents a consultation made by a user
*/

require_once('Vehicle.php');

class VehicleConsultation
{
  private string $date;
  private string $time;
  private Vehicle $vehicle;
  //Class constructor
  public function __construct(string $date,string $time,string $plateNumber)
  {
      if(!$this->validateDate($date)){throw new InvalidArgumentException('Please choose a valid date');}
      if(!$this->validateDate($time,'H:i')){throw new InvalidArgumentException('Please choose a valid time');}
      $this->vehicle=new Vehicle($plateNumber);
      $this->date=$date;
      $this->time=$time;
  }
  //Get functions
  public function getDate(){
    return $this->date;
  }

  public function getTime(){
    return $this->time;
  }

  public function getVehicle(){
    return $this->vehicle;
  }
  //Returns the day of a date
  public function getDayBasedOnDate(){
    $timestamp = strtotime($this->date);
    $day = date('l', $timestamp);
    return $day;
  }
  //Validates a date/time given a format
  private function validateDate(string $date,string $format = 'Y-m-d'){
    $dateCheck = DateTime::createFromFormat($format, $date);
    return $dateCheck && $dateCheck->format($format) === $date;
  }
}
?>
