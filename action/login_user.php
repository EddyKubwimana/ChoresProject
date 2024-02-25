
<?php
session_start();
include("../setting/connection.php");
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT pid, rid, passwd FROM People WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
      $row = mysqli_fetch_assoc($result);
  
      if ($row) {


          $hashedPasswordFromDatabase = $row['passwd'];
  
          if (password_verify($password, $hashedPasswordFromDatabase)) {

            $_SESSION['userId']=$row['pid'];
            $_SESSION['userRole']=$row['rid'];
            header("Location:/choreProject/views/home.php");
          } else {

            $_SESSION['loginFailed'] = true;
           

            header("Location:/choreProject/login/login.php");
          }
        
        }
    else{

      $_SESSION['loginFailed'] = true;
      header("Location:/choreProject/login/login.php");
      exit();




    }
      
  } else {
    $handler = true;
    $_SESSION['loginFailed'] = true;
    echo "Error: " . mysqli_error($conn);
    header("Location:/choreProject/login/login.php");
    exit();
    
  }

  mysqli_close($conn);
?>