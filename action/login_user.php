
<?php

  set_include_path('/Users/macuser/Sites/localhost/labProject/setting/');
  require_once('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT email, passwd FROM people WHERE email='$email' AND passwd='$password'";

$result = $conn->prepare($sql);
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT passwd FROM People WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  
  if ($result) {
      $row = mysqli_fetch_assoc($result);
  
      if ($row) {


          $hashedPasswordFromDatabase = $row['passwd'];
  
          if (password_verify($password, $hashedPasswordFromDatabase)) {

            header("Location:/labProject/views/home.html");


           
              
    
          } else {

            header("Location:/labProject/views/login.html");
              
          }
      } else {
          echo "User not found.";
      }
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>