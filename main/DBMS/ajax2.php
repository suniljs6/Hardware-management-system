<?php
  $host = "localhost";
  $user = "root";
  $passwd = "";
  $db_name = "project";
  
  $name = $_GET['name'];
  $db = new mysqli($host,$user,$passwd,$db_name);
  
  
  if($name!=''){
  	$query = "select company,cost from Components where name='$name'";
  	$run = $db->query($query);
  	
  	echo "<select name='brand' id='brand'>";
  	echo "<option selected='selected'>--select-brand--</option>";
  	while($result = mysqli_fetch_assoc($run)){
  		echo "<option>".$result['company'].',cost:'.$result['cost']."</option>";
  	}
  	echo "</select>";	
  }
   
?>
