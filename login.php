<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include database config file
require_once "config.php";
 
	// Processing form data when form is submitted
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Prepare a select statement
	$sql = "SELECT id, username, password FROM users WHERE username = $username";
	$result = mysqli_query($link, $sql));
    
	//Store result 
	$row = mysqli_fetch_assoc($result);
	
	if ($row['username'] === $username && $row['password'] === $password) {
		$_SESSION['username'] = $row['username'];
		$_SESSION["id"] = $id;
		$_SESSION["username"] = $username;
		header("Location: welcome.php");
		exit();
	}else {
		header("Location: index.html");
	}
?>
