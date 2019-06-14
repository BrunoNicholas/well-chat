<!-- delete.php -->
<?php 

	session_start();
	include ('../database/connect.php');

	$id = $_POST['id'];

	$sql_del = "DELETE FROM chats WHERE id = '$id' ";

	$result  =  $conn->query($sql_del);


	header("Location:../home.php");