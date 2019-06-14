<!-- del_user.php -->
<?php
	
	include ('../database/connect.php');

	$id = $_POST['id'];

	$sql_udel = "DELETE FROM chat_users WHERE id = '$id' ";

	$result  =  $conn->query($sql_udel);


	header("Location:../home.php");