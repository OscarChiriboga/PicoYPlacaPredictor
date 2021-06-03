<?php
class Vehicle
{
  private string $plateNumber;
  private string $registrationType;

  public function __construct(string $plateNumber)
  {
    if(!$this->validatePlateNumber($plateNumber)){
      throw new Exception('PlateNumber is not valid. It must contain 3 alphabetic characters, a "-" and 3 to 4 numeric digits, e.g. AAA-1234.');
    }
    $this->plateNumber=$plateNumber;
    $this->registrationType=$this->rTypeBasedOnPlate();
  }

  public function getPlateNumber(){
    return $this->plateNumber;
  }

  public function getRegistrationType(){
    return $this->registrationType;
  }

  public function getPLastDigit(){
    return substr($this->plateNumber,-1);
  }

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

  private function validatePlateNumber(string $plateNumber){
    if(strlen($plateNumber)==7||strlen($plateNumber)==8){
      $plateNumber=strlen($plateNumber)==7?'0'.$plateNumber:$plateNumber;
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
