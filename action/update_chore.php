
<?php
session_start();
include("../setting/connection.php");
$chorname= mysqli_real_escape_string($conn,$_GET['choreName']);
$cid = mysqli_real_escape_string($conn,$_GET['cid']);
$sql = " UPDATE  Chores SET chorename = '$chorname' where  cid = $cid";
$result = mysqli_query($conn, $sql);
  
if ($result) {
    $_SESSION["successupdate"] = true;
    header("Location:/choreProject/admin/chore_control_view.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>