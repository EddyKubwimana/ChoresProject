<?php
session_start();
include("../setting/connection.php");

$cid = mysqli_escape_stringc($conn, $_POST["cid"]);








?>