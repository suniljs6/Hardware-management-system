<?php
  $host = "localhost";
  $user = "root";
  $passwd = "";
  $db_name = "project";
  
  $name = $_GET['name'];
  $db = new mysqli($host,$user,$passwd,$db_name);
  
  
  if($name!=''){
  	$query = "select description from Components where name='$name'";
  	$run = $db->query($query);
  	$result = mysqli_fetch_assoc($run);
  	echo "<br>";
  	echo "<span id='span' name='span'>".$result['description']."</span>";
  }
   
?>
