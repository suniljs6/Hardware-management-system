<?php
	session_start();
?>
<html>
	<h3><?php $a=$_SESSION['username']; echo "welcome:$a"; ?></h3>
	<form method="post">
		<input type="number" name="sid" placeholder="enter sid">
		<input type="submit" name="submit">
	</form>
<?php
	if(isset($_POST['submit'])){
		$_SESSION['sid'] = $_POST['sid'];
		header('location:/reissue_return/crud/');	
	}
?>
</html>
