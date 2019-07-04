<?php
include '../DbConnect.php';

$response = array();
$Point = array();
$i=0;
$no=2;

if (isset($_POST['lat'])&&isset($_POST['lon'])&&isset($_POST['id'])) {
  $dr1=$dr2='1';
    $lat=$_POST['lat'];
    $lon=$_POST['lon'];
    $id=$_POST['id'];
    $url="http://localhost:8989/route?points_encoded=false&point=";
    $Orig="&point=".$lat.','.$lon;
    $sql = "select driKey1,driKey2 from current where id='$id'";
    $result = mysqli_query($con,$sql);
    if (!empty($result)){
      while ($row=mysqli_fetch_assoc($result)) {
        $dr1=$row['driKey1'];
        $dr2=$row['driKey2'];
      }
    }

    if(strcmp($dr2,'1')==0){
      $dr2=null;
      $no=1;
    }
    $sql="select * from driver where uiKey='$dr1'or uiKey='$dr2'";
    $result = mysqli_query($con,$sql);
    if (!empty($result)) {
      while ($row=mysqli_fetch_assoc($result)) {
        $Point[$row['uiKey']]=$row['lat'].','.$row['lon'];
        $coord[$row['uiKey']]=array($row['lat'],$row['lon']);
      }
      $response["success"] = 1;
      foreach($Point as $key=>$value){
          $link=$url.$value.$Orig;
          $response[$i.'co']=$coord[$key];
          $response[$i]=json_decode(file_get_contents($link));
          $i=$i+1;
      }
        $response["no"] = $no;
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
