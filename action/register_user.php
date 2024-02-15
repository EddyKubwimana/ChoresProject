<?php
set_include_path('/Users/macuser/Sites/localhost/labProject/setting/');

require_once('connection.php');

  $pid = $_POST['pid'];
  $fid = $_POST['fid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $passwd = $_POST['passwd'];

$hashed_password =  password_hash($passwd, PASSWORD_BCRYPT);

  $sql = "INSERT INTO People (rid, fid, fname, lname, gender, dob, tel, email, passwd) VALUES ('3', '$fid', '$fname', '$lname', '$gender', '$dob', '$tel', '$email', '$hashed_password')";
 if ($conn->query($sql)===true){
  header("Location:/labProject/views/home.html");
 }else{

  echo "failed registering ";
 };

 
 $conn->close();
 exit();

