<?php
include '../DbConnect.php';
$response = array();

$av='1';
$s=1;
// check for required fields
if (isset($_POST['lat'])&& isset($_POST['lon'])&&isset($_POST['key'])) {

    $Lat = $_POST['lat'];
    $Lon = $_POST['lon'];
    $key = $_POST['key'];

    $result = mysqli_query($con,"update driver set lat='$Lat', lon='$Lon' where uiKey = '$key'");
    $result = mysqli_query($con,"select onDrive from driver where uiKey = '$key'");
    if (!empty($result))
          if($row = mysqli_fetch_assoc($result)){
            if(strcmp($row['onDrive'],'0')!=0)
              $av=$row['onDrive'];
              $s=2;
          }

    if ($result) {
        $response["success"] = $s;
        $response["message"] = "Product successfully created.";
        $response["id"]=$av;
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        echo json_encode($response);
    }
}
 else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}

?>
