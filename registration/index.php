<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LOGIN</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" media="screen">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>

<div class="signin-form">

    <div class="container">

        <form class="form-signin" enctype="multipart/form-data" method="post" id="register-form" action="register.php" >

            <h2 class="form-signin-heading">Sign Up</h2><hr />

            

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Gender" name="gender" id="gender" required/>
            </div>
            <div class="form-group">
                <input type="number"  Class="form-control" placeholder="Phone_no" name="phone" id="phone" min=10 max=10/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Category" name="category" id="category" required/>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
            </div>
            <hr />
            <div class="form-group">
                <input type="submit" class="btn btn-default" name="btn" id="btn" value="Create Account">
            </div>
	<div class="form-group">
                <a href="/Login_v8/index.php">Already registered? SIGN IN</a>
            </div>
        </form>

    </div>

</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
