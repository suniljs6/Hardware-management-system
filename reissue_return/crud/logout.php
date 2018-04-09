<?php
	session_start();
	if($_SESSION['username'] && $_SESSION['id'])
		session_destroy();
	header("location:/main/DBMS");
?>
