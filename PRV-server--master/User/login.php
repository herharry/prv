<?php
include '../DbConnect.php';

$response = array();

if (isset($_POST['mob'])&& isset($_POST['pass'])&&isset($_POST['imei'])) {
    $mob = $_POST['mob'];
    $pass = $_POST['pass'];
    $imei = $_POST['imei'];
    $result = mysqli_query($con,"select uiKey,imei from user where id='$mob' and pass='$pass'");

    if(!empty($result)){
      if ($row=mysqli_fetch_assoc($result)) {
        if(strcmp($imei,$row['imei'])==0){
          $key=$row['uiKey'];
          $response["success"] = 1;
          $response["KEY"] = $key;
        }
        else{
          $response["success"] = 2;
          $response["message"] = "Wrong Phone Used";
        }
      echo json_encode($response);
    }
  }
    else {
      $response["success"] = 0;
      $response["message"] = "No User found";

      echo json_encode($response);
    }
}
 else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}

?>
