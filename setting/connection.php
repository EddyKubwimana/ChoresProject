<?php
  $db_host = '127.0.0.1';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'chores_mgt';
  $db_port = 8889;

  $conn = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
	$db_port
  );
	
  if ($conn->connect_error) {
    echo 'Errno: '.$conn->connect_errno;
    echo '<br >';
    echo 'Error: '.$conn->connect_error;
    exit();
  }

?>