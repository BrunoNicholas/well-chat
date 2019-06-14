<!-- session.php -->
<?php
	
	session_start();

	if (isset($_SESSION['session_name'])) {
		echo $_SESSION['session_name'];
	}

?>