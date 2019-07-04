<?php
include '../DbConnect.php';

$response = array();

function generateKey($con){
  $keyLenght=16;
  $str="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $randStr = substr(str_shuffle($str),0,$keyLenght);

  $checkKey = checkKeys($con,$randStr);

  while ($checkKey) {
    $randStr = substr(str_shuffle($str),0,$keyLenght);
    $checkKey = checkKeys($con,$randStr);
  }

  $result = mysqli_query($con,"insert into uikeys(uiKey) values('$randStr')");

  return $randStr;
}

function checkKeys($con,$str){
  $sql = "select * from uikeys where uiKey=''$str'";
  $result = mysqli_query($con,$sql);
  if (!empty($result))
      if (mysqli_num_rows($result) == 0)
        while($row = mysqli_fetch_assoc($result))
          if(strcmp($row['uiKey'],$str)==0)
              return false;
          else
            return true;
}

if (isset($_POST['mob'])&& isset($_POST['pass'])&&isset($_POST['imei'])) {
    $mob = $_POST['mob'];
    $pass = $_POST['pass'];
    $imei = $_POST['imei'];
    $result = mysqli_query($con,"select id from user where id=$mob");
    if (mysqli_num_rows($result)==0) {
      $key=generateKey($con);
      $sql="insert into user(id,pass,uiKey,lat,lon,imei) values('$mob','$pass','$key',13.065057, 80.2263933,'$imei')";
      $result = mysqli_query($con,$sql);
      if ($result) {
          $response["success"] = 1;
          $response["message"] = "User successfully created.";
          $response["KEY"]=$key;
          echo json_encode($response);
      }
      else {
          $response["success"] = 0;
          $response["message"] = "Oops! An error occurred.";
          echo json_encode($response);
      }
    }
    else {
      $response["success"] = 0;
      $response["message"] = "User already exists";
      echo json_encode($response);
    }
 }
 else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}

?>
