<?php
  $host = "localhost";
  $user = "root";
  $passwd = "";
  $db_name = "project";
  
  $type = $_GET['type'];
  $db = new mysqli($host,$user,$passwd,$db_name);
  
  
  if($type!=''){
  	$query = "select name,cost from Components where type='$type'";
  	$run = $db->query($query);
  	
  	echo "<select name='name' id='name' onChange='brand_change()'>";
	echo "<option selected='selected'>--select-name--</option>";
  	while($result = mysqli_fetch_assoc($run)){
  		echo "<option>".$result['name']."</option>";
  	}
  	echo "</select>";	
  } 
?>
