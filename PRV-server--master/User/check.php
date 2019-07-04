<?php
include '../DbConnect.php';
$response = array();

function checkKeys($con,$str){
  global $response;
  $sql = "select * from user where uiKey='$str'";
  $result = mysqli_query($con,$sql);
  if (!empty($result))
      if (mysqli_num_rows($result) > 0)
        while($row = mysqli_fetch_assoc($result))
          if(strcmp($row['uiKey'],$str)!=0)
            return false;
          else
            return true;
}

if (isset($_POST['key'])) {
    $key = $_POST['key'];
    $check=checkKeys($con,$key);
    if ($check) {
        $response["success"] = 1;
        $response["message"] = "Login";

        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "No user found";

        echo json_encode($response);
    }
}
 else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}

?>
