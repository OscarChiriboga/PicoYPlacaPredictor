<?php
/*
Name: Oscar Chiriboga
File: index.php
Description: Contains homepage of project
*/
require_once('Utility/PicoYPlacaPredictor.php');

$plateNumber='';
$date='';
$time='';
$errors=0;
$message='';

if(isset($_POST['submit'])) {
  $plateNumber=htmlspecialchars($_POST['plateNumber'],ENT_QUOTES);
  $date=htmlspecialchars($_POST['date'],ENT_QUOTES);
  $time=htmlspecialchars($_POST['time'],ENT_QUOTES);
  try{
    $vConsult=new VehicleConsultation($date,$time,$plateNumber);
  }
  catch (Exception $e){
    $errors=1;
    $message="Warning: ".$e->getMessage();
  }
}
if(isset($_POST['submit'])&&$errors==0){
  $message=PicoYPlacaPredictor::checkIfCanDrive($vConsult);
  $plateNumber='';
  $date='';
  $time='';
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr"><head>
  <meta charset="utf-8">
  <title>Pico Y Placa Predictor</title>
  <link rel="stylesheet" href="css/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div id="containerBox" class="box">
    <div id="Box21"></div>

    <form id="containerBox22" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

      <div id="Box221">
        <div id="Title1" class="Title">
          <h1 id="Titulo">Pico Y Placa Predictor</h1>
        </div>
        <div id="Title2" class="Title">
          <hr class="Title2">
        </div>
      </div>

      <div id="Box222">
        <div id="listasA">
          <ul class="datos">
            <li class="datos"><label class="datos" for="plateNumber">Plate number (*):</label></li>
            <li class="datos"><input class="datos" type="text" name="plateNumber" placeholder="E.g. PDN-3869" value="<?php echo $plateNumber; ?>"></li>
          </ul>
        </div>
      </div>

      <div id="Box223">
        <ul id="dateInputContainer" class="datos">
          <li class="datos"><label class="datos" for="date">Date (*):</label></li>
          <li class="datos"><input class="datos" type="Date" name="date" min="<?php echo date("Y-m-d");?>"></li>
          <li class="datos"><br><br></li>
        </ul>
        <ul class="datos">
          <li id="buttonContainer" class="datos"><input id="button" type="submit" name="submit" value="Enviar"></li>
          <li id="message" class="datos"><?php echo $message;?></li>
        </ul>
      </div>

      <div id="Box224">
        <ul class="datos">
          <li class="datos"><label class="datos" for="time">Time (*):</label></li>
          <li class="datos"><input class="datos" type="time" name="time"></li>
        </ul>
      </div>

    </form>

    <div id="Box23"></div>
    <div id="Box24"></div>
    <div id="Box25"></div>
  </div>
</body>
</html>
