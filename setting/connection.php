<?php
  $db_host = '34.35.54.200';
  $db_user = 'root';
  $db_password = 'Ilove@Coding1';
  $db_db = 'chores_mgt';
  $db_port = 3306;

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
