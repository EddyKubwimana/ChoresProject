<?php
session_start();
include("../setting/connection.php");
$id = mysqli_real_escape_string($conn,$_GET['assignmentid']);
$sql = "UPDATE Assignment 
        SET sid = (SELECT sid FROM Status WHERE sname = 'Incomplete')
        WHERE assignmentid = $id";

$result = mysqli_query($conn, $sql);
  
if ($result) {
    header("Location:/choreProject/admin/assign_chore_view.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>