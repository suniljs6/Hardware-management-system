<?php
  $host = "localhost";
  $user = "root";
  $passwd = "";
  $db_name = "project";

  $db = new mysqli($host,$user,$passwd,$db_name);
  $component = $_POST['ctype'];
  echo $component;
?>
