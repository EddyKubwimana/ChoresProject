
<?php
session_start();
include("../setting/connection.php");

$chorname= mysqli_real_escape_string($conn,$_POST['choreName']);
 
$sql = " INSERT INTO Chores(chorename) values('$chorname')";
$result = mysqli_query($conn, $sql);
  
if ($result) {
    $_SESSION["successChore"] = true;
    header("Location:/choreProject/admin/chore_control_view.php");
    exit() ;
      
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>