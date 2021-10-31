<?php
session_start();
if(isset($_SESSION['user_id'])) {	
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	session_destroy();
	header("Location: login.php");
} else {
	header("Location: login.php");
}
?>