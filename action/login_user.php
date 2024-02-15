
<?php

  set_include_path('/Users/macuser/Sites/localhost/labProject/setting/');
  require_once('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT email, passwd FROM people WHERE email='$email' AND passwd='$password'";

$result = $conn->prepare($sql);


if ($result) { 
  

    header("Location:/labProject/views/home.html");

  }else{


    header("Location:/labProject/views/login.html");


  }

$conn->close();
?>