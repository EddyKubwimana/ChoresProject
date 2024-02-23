<?php
unset($_SESSION["userId"]);
unset($_SESSION["userRole"]);
header("Location:/choreProject/login/login.php");
exit();

?>
