<?php

  set_include_path('/Users/macuser/Sites/localhost/labProject/setting/');
  require_once('connection.php');

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// Sanitize user input to prevent SQL injection (use prepared statements in a production environment)

// Query to check user credentials (replace 'users' with your actual table name)
$sql = "SELECT * FROM people WHERE email='$email' AND passwd='$password'";

$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // User authenticated successfully
    header("Location:/labProject/views/home.html");
} else {
    // Invalid credentials
    $_SESSION['connection_success']= true;
}

// Close database connection
$conn->close();
?>




  
