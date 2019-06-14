<!-- send.php -->
<?php

	session_start();
	include ('../database/connect.php');

	$id_sender		= $_POST['id_sender'];
	$id_receiver	= $_POST['id_receiver'];
	$topic			= $_POST['topic'];
	$message	= $_POST['message'];
	$category		= $_POST['category'];

	$sql_3 = "INSERT INTO chats ( id_sender,id_receiver,topic,message,category) VALUES ('$id_sender','$id_receiver','$topic','$message','$send_as')";

	$result = $conn->query($sql_3);

	header("Location:../home.php");

	