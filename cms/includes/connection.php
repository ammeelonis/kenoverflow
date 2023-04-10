<?php

//config
$server = "localhost";
$user = "root";
$password = "";
$db = "kenoverflow";

//Establishing Database connection
$conn = new mysqli($server, $user, $password, $db);
$database = mysqli_select_db($conn, $db) or die("DB Selection Error: ".mysql_error());

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>
