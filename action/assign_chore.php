<?php
session_start();
include("../setting/connection.php");

$pid = mysqli_escape_string($conn, $_POST["pid"]);
$aid = mysqli_escape_string($conn, $_POST["aid"]);








?>