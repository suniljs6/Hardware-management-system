<?php
$db_host = "localhost";
$db_name = "project";
$db_user = "root";
$db_pass = "";

    $db_con = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
    if(empty($db_con)){
	echo mysqli_error($db_con);
	}
?>
