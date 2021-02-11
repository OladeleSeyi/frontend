<?php
$servername = "localhost";
$username = "deliveri_dev";
$password = "";
$dbname = "deliveri_orders";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

