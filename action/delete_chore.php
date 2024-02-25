<?php
session_start();
include("../setting/connection.php");
$cid= $_GET['cid'];

$sql = "DELETE FROM Chores where cid = $cid";
$result = mysqli_query($conn, $sql);
if ($result) {
    $_SESSION["successdeletion"] = true;
    header("Location:/choreProject/admin/chore_control_view.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>