<?php
set_include_path('/Users/macuser/Sites/localhost/labProject/setting/');

require_once('connection.php');

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
$sql = "INSERT INTO People (rid, fid, fname, lname, gender, dob, tel, email, passwd) VALUES ('3', '$fid', '$fname', '$lname', '$gender', '$dob', '$tel', '$email', '$hashed_password')";
 if ($conn->query($sql)===true){
  $_SESSION['registration_success'] = true;
  header("Location:/labProject/login/register.php");
  exit();
  
 }else{

  $_SESSION['registration_success'] = false;

  header("Location:/labProject/login/register.php");
 };

 
 $conn->close();
 exit();

