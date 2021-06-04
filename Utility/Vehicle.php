<?php
/*
Name: Oscar Chiriboga
File: Vehicle.php
Description: Contains class that represents a Vehicle
*/

class Vehicle
{
  private string $plateNumber;
  private string $registrationType;

  //Class constructor
  public function __construct(string $plateNumber)
  {
    if(!$this->validatePlateNumber($plateNumber)){
      throw new InvalidArgumentException('PlateNumber is not valid. It must contain 3 alphabetic characters, a "-" and 3 to 4 numeric digits, e.g. AAA-1234.');
    }
    $this->plateNumber=$plateNumber;
    $this->registrationType=$this->rTypeBasedOnPlate();
  }
  //Get functions
  public function getPlateNumber(){
    return $this->plateNumber;
  }

  public function getRegistrationType(){
    return $this->registrationType;
  }
  //Returns plate number's last digit
  public function getPLastDigit(){
    return substr($this->plateNumber,-1);
  }
  //Returns the registration type of a Vehicle based on the plate number's 2nd character
  private function rTypeBasedOnPlate(){
    $registrationType;
    switch (substr($this->plateNumber, 1, -6)) {
      case 'A':
      case 'U':
      case 'Z':
        $registrationType='Commercial';
        break;
      case 'E':
        $registrationType='Government';
        break;
      case 'X':
        $registrationType='Official use';
        break;
      case 'M':
        $registrationType='Decentralized autonomous government';
        break;
      default:
        $registrationType='Private';
        break;
    }
    return $registrationType;
  }
  //Validates a plate number, adds a zero to 7 digit plate numbers (old plate number format)
  private function validatePlateNumber(string &$plateNumber){
    if(strlen($plateNumber)==7||strlen($plateNumber)==8){
      $plateNumber=strlen($plateNumber)==7?substr_replace($plateNumber,"0",4,0):$plateNumber;
      $first3Digits=substr($plateNumber,0,-5);
      $last4Digits=substr($plateNumber,4);
      if(ctype_alpha($first3Digits)&&is_numeric($last4Digits)&&$plateNumber[3]=='-'){
        return true;
      }
    }
    return false;
  }
}
?>
