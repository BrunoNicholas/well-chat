<!-- connect.php -->

<?php

	$conn = mysqli_connect("localhost", "root", "", "fast_chat");

	if(!$conn)
	{
		die("connection to the database failed" . mysqli_connect_error());
	}