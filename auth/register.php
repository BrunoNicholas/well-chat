<!-- // register.php -->
<?php

	include ('../database/connect.php');

	$name		= $_POST['name'];
	$full_name	= $_POST['full_name'];
	$email		= $_POST['email'];
	$password	= $_POST['password'];
	// $confim_password = $_POST['confim_password'];
	$agreement	= $_POST['agreement'];

	$sql_1	=	"INSERT INTO users (name, full_name, email, password, agreement) VALUES ('$name','$full_name','$email','bcrypt($password)','$agreement')";

	$result 	=	$conn->query($sql_1);

	header("Location:../index.php");