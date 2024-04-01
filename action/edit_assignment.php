<?php
session_start();
include("../setting/connection.php");
$cid = mysqli_real_escape_string($conn, $_POST['assignmentid']);
$date_assign = mysqli_real_escape_string($conn, $_POST['assignedDate']);
$date_due = mysqli_real_escape_string($conn, $_POST['dueDate']);

$sql = "UPDATE Assignment SET date_assign = '$date_assign', date_due = '$date_due' WHERE assignmentid = $cid";

$result = mysqli_query($conn, $sql);
  
if ($result) {
   
    header("Location:/choreProject/admin/assignment_control_view.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>