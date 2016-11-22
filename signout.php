<?php 
	session_start();
	
	foreach($_SESSION as $key => $val) {
 		unset($_SESSION[$key]);
	}
	session_write_close();
	header('Location: index.php');
?>

