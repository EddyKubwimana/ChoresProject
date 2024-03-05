<?php
session_start();
include("../setting/connection.php");
$cid= mysqli_real_escape_string($conn,$_POST['cid']);
$sid= mysqli_real_escape_string($conn,$_POST['sid']);
$date_assign= mysqli_real_escape_string($conn,$_POST['assignedDate']);
$date_due= mysqli_real_escape_string($conn,$_POST['dueDate']);
$userId = $_SESSION["userId"];
 
$sql = " INSERT INTO Assignment(cid,sid,date_assign,date_due, who_assigned) values('$cid','$sid','$date_assign','$date_due','$userId')";
$result = mysqli_query($conn, $sql);
  
if ($result) {
   
    header("Location:/choreProject/admin/assignment_control_view.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>