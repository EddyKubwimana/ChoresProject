
<?php
session_start();
include("../setting/connection.php");
$cid= $_POST['cid'];
 
$sql = "DELETE FROM chores where cid = $cid";
$result = mysqli_query($conn, $sql);
  
if ($result) {
    $_SESSION["successdeletion"] = true;
    header("Location:/choreProject/views/addChore.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>