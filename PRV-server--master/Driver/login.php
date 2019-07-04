<?php
include '../DbConnect.php';

$response = array();

if (isset($_POST['mob'])&& isset($_POST['pass'])) {
    $mob = $_POST['mob'];
    $pass = $_POST['pass'];
    $result = mysqli_query($con,"select uiKey from driver where id='$mob' and pass='$pass'");

    if(!empty($result)){
      if ($row=mysqli_fetch_assoc($result)) {
          $key=$row['uiKey'];
          $response["success"] = 1;
          $response["KEY"] = $key;
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
