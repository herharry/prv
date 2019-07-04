<?php
include '../DbConnect.php';

$response = array();
$Point;
$i=0;
$no=2;

if (isset($_POST['lat'])&&isset($_POST['lon'])&&isset($_POST['id'])) {
    $lat=$_POST['lat'];
    $lon=$_POST['lon'];
    $id=$_POST['id'];
    $usr;
    $url="http://localhost:8989/route?points_encoded=false&point=";
    $Orig="&point=".$lat.','.$lon;
    $sql = "select reqKey from current where id='$id'";
    $result = mysqli_query($con,$sql);
    if (!empty($result)){
      while ($row=mysqli_fetch_assoc($result)) {
        $usr=$row['reqKey'];
      }
    }
    $sql="select lat,lon from user where uiKey='$usr'";
    $result = mysqli_query($con,$sql);
    if (!empty($result)) {
      while ($row=mysqli_fetch_assoc($result)) {
        $lat=$row['lat'];
        $lon=$row['lon'];
      }

      $response["success"] = 0;
      $response["lat"] = $lat;
      $response["lon"] = $lon;  
      echo json_encode($response);
      }
    else {
      $response["success"] = 0;
      $response["message"] = "An error occured";
      echo json_encode($response);
    }
  }
  else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}

?>
