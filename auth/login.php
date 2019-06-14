<!--// login.php -->
<?php
	include ('../database/connect.php');

	$name 		=	$_POST['name'];
	$password	=	$_POST['password'];

	$sql_2	=	"SELECT * FROM chat_users WHERE name = '$name' AND password = '$password'";

	$result = $conn->query($sql_2);
	
	if ($row = $result->fetch_assoc()) {

		session_start();

		$_SESSION['session_name']	=	$name;

		$_SESSION['full_name']		=	$row['full_name'];
		$_SESSION['email']			=	$row['email'];
		$_SESSION['id']			=	$row['id'];

		header("Location:../home.php");
	}
	else {
		header("Location:../error.php");
	} 
	