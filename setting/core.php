<?php
  $db_host = '127.0.0.1';
  $db_user = 'root';
  $db_password = 'Ilove@Coding1';
  $db_db = 'chores_mgt';
  $db_port = 8889;

  $mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
	$db_port
  );