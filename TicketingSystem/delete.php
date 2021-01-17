<?php
session_start();

// Create connection
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ttbs3";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_ID = $_SESSION['user_ID'];
$sql = "DELETE FROM user WHERE user_ID='$user_ID'";
$result = $conn->query($sql);
if ($result) {
	session_destroy();
	header('Location:index.php');
}

?>