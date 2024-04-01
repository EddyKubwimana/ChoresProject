<?php
include("../setting/connection.php");
$id=mysqli_real_escape_string($conn,$_GET['id']);
$sql = "DELETE FROM Assignment where assignmentid = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
  
    header("Location:/choreProject/admin/assignment_control_view.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>