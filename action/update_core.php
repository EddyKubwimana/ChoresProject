
<?php
session_start();
include("../setting/connection.php");
$chorname= $_GET['choreName'];
$cid = $_GET['cid'];
 
$sql = " UPDATE  chores SET chorname = '$chorname' where  cid = $cid";
$result = mysqli_query($conn, $sql);
  
if ($result) {
    $_SESSION["successupdate"] = true;
    header("Location:/choreProject/views/addChore.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>