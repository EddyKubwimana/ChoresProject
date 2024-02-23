
<?php
session_start();
include("../setting/connection.php");
$chorname= $_POST['choreName'];
 
$sql = " INSERT INTO chores(chorname) values('$chorname')";
$result = mysqli_query($conn, $sql);
  
if ($result) {
    $_SESSION["successChore"] = true;
    header("Location:/choreProject/views/addChore.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>