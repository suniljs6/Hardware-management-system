<?php

require_once 'dbconfig.php';

if($_POST)
{
    $user_name 		= mysqli_real_escape_string($db_con,$_POST['user_name']);
    $user_email 	= mysqli_real_escape_string($db_con,$_POST['user_email']);
    $user_password 	= mysqli_real_escape_string($db_con,$_POST['password']);
    $user_phone     = $_POST['phone'];
    $user_gender    = mysqli_real_escape_string($db_con,$_POST['gender']);
    $user_category  = mysqli_real_escape_string($db_con,$_POST['category']);
    
    	$password 	= password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 11));
	
   
   $stmt = "INSERT INTO Student(name,email,password,phone,gender,category) VALUES('$user_name','$user_email','$user_password',$user_phone,'$user_gender','$user_category')";
            
            if(mysqli_query($db_con,$stmt))
            {
                //echo "registered";
		header("location:/index.php");
            }
            else
            {
            	echo mysqli_error($db_con);
                echo "TRY AGAIN LATER";
            }
         


	
	//password_hash see : http://www.php.net/manual/en/function.password-hash.php
	

        
}

?>
