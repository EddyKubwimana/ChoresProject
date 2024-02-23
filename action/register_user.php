<?php
include("../setting/connection.php");
session_start();

$pid = mysqli_real_escape_string($conn, $_POST['pid']);
$fid = mysqli_real_escape_string($conn, $_POST['fid']);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$tel = mysqli_real_escape_string($conn, $_POST['tel']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$passwd = mysqli_real_escape_string($conn, $_POST['passwd']);
$hashed_password =  password_hash($passwd, PASSWORD_BCRYPT);
$checkEmail = "SELECT* FROM People where email = $email";

$checkerEmail = "SELECT passwd FROM People WHERE email = '$email'";
  $result = mysqli_query($conn, $checkerEmail);
  
  if ($result) {
      $row = mysqli_fetch_assoc($result);
  
      if ($row){

        $_SESSION["duplicatedEmail"] = true;
            mysqli_free_result($checker);
            header("Location:/choreProject/login/register.php");

            $conn->close() ;
            exit();

      
      }

  }


 $sql = "INSERT INTO People (rid, fid, fname, lname, gender, dob, tel, email, passwd) VALUES ('3', '$fid', '$fname', '$lname', '$gender', '$dob', '$tel', '$email', '$hashed_password')";
 if ($conn->query($sql)===true ){

            $_SESSION['registration'] = true;
            header("Location:/choreProject/login/register.php");
            
            }
            
else{
            header("Location:/choreProject/login/register.php");
    };



$conn->close();
?>







