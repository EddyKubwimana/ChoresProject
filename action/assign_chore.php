<?php
session_start();
include("../setting/connection.php");

$pid = mysqli_escape_string($conn, $_POST["pid"]);
$aid = mysqli_escape_string($conn, $_POST["aid"]);

$sql = "INSERT INTO Assigned_people(pid,assignmentid) values('$pid','$aid')";

$result = mysqli_query($conn,$sql);

if ($result) {
    $_SESSION["successfulAssignment"] = true;
    header("Location:/choreProject/admin/assign_chore_view.php");
    mysqli_close($conn);
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
      mysqli_close($conn);
      exit() ;
  }
  
 




?>