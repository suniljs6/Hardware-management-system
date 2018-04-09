<?php
	$host = "localhost";
  	$user = "root";
  	$passwd = "";
  	$db_name = "project";
  	
  	$db = new mysqli($host,$user,$passwd,$db_name);
  
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IIITS hardware LAB</title>
    <meta name="description" content="iits hardware LAB">
    <!--<link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">-->
    <!-- custom.css -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- font-awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- AOS -->
    <link rel="stylesheet" href="css/aos.css">
   
</head>

<body>
    <!-- banner -->
    <div class="main-nav navbar-collapse collapse">
                <div class="container">
                    <div class="minilogo">
                        <a  href="" class="navbar-brand"><img src="assets/images/logo3.png" alt="Logo" /></a>
                    </div>
                    <ul class="nav nav-justified">
                        <li><a class="active" href="#home">HOME</a></li>
                        <li><a href="#service">REGISTER</a></li>
                        <li><a href="#lessons">COMPONENTS </a></li>
                        <li><a href="#portfolio">INCHARGES</a></li>
                        <li><a href="#blog">ISSUE</a></li>
                        <li><a href="#contact">REISSUE</a></li>
                    </ul>
                </div>
            </div>
    <div class="jumbotron jumbotron-fluid" id="banner" style="background-image: url(img/banner-bk.jpg);">
        <div class="container text-center text-md-left">
            <header>
                <div class="row justify-content-between">
                    <div class="col-2">
                        <img src="img/logo.png" alt="logo">
                    </div>
                    <div class="col-6 align-self-center text-right">
                        <a href="/Login_v8/" class="text-white lead">Login/Sign up</a>
                    </div>
                </div>
            </header>
            <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="display-3 text-white font-weight-bold my-5">
            	IIITS<br>
            	Online Hardware Lab
            </h1>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="lead text-white my-4">
                A digital way to issue and reissue components without hassle.
                <br> Check availability of components or request for requirements.
            </p>
            <!--<a href="#" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green">Get Started</a>!-->
        </div>
    </div>
    <!-- three-blcok -->
    <div class="container my-5 py-2">
        <h2 class="text-center font-weight-bold my-5">Digital solution to access facilities</h2>
        <div class="row">
            <div data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
                <img src="img/smart-protect-1.jpg" alt="Anti-spam" class="mx-auto">
                <h4>Search</h4>
                <p>Search for components. No need of visiting lab multiple time</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
                <img src="img/smart-protect-2.jpg" alt="Phishing Detect" class="mx-auto">
                <h4>Request</h4>
                <p>Place request for new components through your laptop</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
                <img src="img/smart-protect-3.jpg" alt="Smart Scan" class="mx-auto">
                <h4>Smart access</h4>
                <p>Issue or reissue without hassles. Check the inventory for availability</p>
            </div>
        </div>
    </div>
    <!-- feature (skew background) -->
    <div class="jumbotron jumbotron-fluid feature" id="feature-first">
        <div class="container my-5">
            <div class="row justify-content-between text-center text-md-left">
                <div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true" class="col-md-6">
                    <h2 class="font-weight-bold">Search for components</h2>
                    <p class="my-4">Enter the type of component(board, resitor etc.)
                        <br>All types of board will be displayed</p>
                    
					<div class="search-container">
    <form action="#">
      <?php
      $query = "select distinct type from Components";
      $run = $db->query($query);
  
	  //echo "<select name='type' onChange='show(this.value)'>";
	  echo "<select name='type' id='type' onChange='type_change()'>";
	  echo "<option selected='selected'>--select-type--</option>";
	  while($result = mysqli_fetch_assoc($run)){
	  	$r = $result['type'];
	  	echo "<option value='$r'>".$result['type']."</option>";
	  	echo "<br>";
	  }
	  echo '</select>';
	  //echo "<br>";
	  echo "<select name='name' id='name' onChange='brand_change()'>";
	  echo "</select>";
	  echo "<select name='brand' id='brand' onChange='name_change()'>";
	  echo "</select>";
	  echo "<span id='span' name='span'></span>";
	  ?>
    </form>
  </div>				
                </div>
                <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" class="col-md-6 align-self-center">
                    <img src="img/feature-1.png" alt="Take a look inside" class="mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
    <!-- feature (green background) -->
    <div class="jumbotron jumbotron-fluid feature" id="feature-last">
        <div class="container">
            <div class="row justify-content-between text-center text-md-left">
                <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" class="col-md-6 flex-md-last">
                    <h2 class="font-weight-bold">Robust and Reliable</h2>
                    <p class="my-4">
                        Learn more about the components you would like to use
                        <br> Lab access made easy..
                    </p>
                    <a href="http://www.edgefxkits.com/blog/electrical-electronic-components-used-in-projects/" class="btn my-4 font-weight-bold atlas-cta cta-blue" target="_blank">Learn More</a>
                </div>
                <div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true" class="col-md-6 align-self-center flex-md-first">
                    <img src="img/feature-2.png" alt="Safe and reliable" class="mx-auto d-block">
                </div>
            </div>
        </div>
    </div>

    <!-- client 
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-2 py-2 align-self-center">
                    <img src="img/client-1.png" class="mx-auto d-block">
                </div>
                <div class="col-sm-4 col-md-2 py-2 align-self-center">
                    <img src="img/client-2.png" class="mx-auto d-block">
                </div>
                <div class="col-sm-4 col-md-2 py-2 align-self-center">
                    <img src="img/client-3.png" class="mx-auto d-block">
                </div>
                <div class="col-sm-4 col-md-2 py-2 align-self-center">
                    <img src="img/client-4.png" class="mx-auto d-block">
                </div>
                <div class="col-sm-4 col-md-2 py-2 align-self-center">
                    <img src="img/client-5.png" class="mx-auto d-block">
                </div>
                <div class="col-sm-4 col-md-2 py-2 align-self-center">
                    <img src="img/client-6.png" class="mx-auto d-block">
                </div>
            </div>
        </div>
    </div>-->
    <!-- contact -->
    <div class="jumbotron jumbotron-fluid" id="contact" style="background-image: url(img/contact-bk.jpg);">
        <div class="container my-5">
            <div class="row justify-content-between">
                <div class="col-md-6 text-white">
                    <h2 class="font-weight-bold">Request a component</h2>
                    <p class="my-4">
                        Couldn't find a component? Request for one.
                        <br> Enter the details with your institute email-id
                    </p>
                    <ul class="list-unstyled">
                        <li>Email : hardware_lab@iiits.in</li>
                        <li>Phone : 9920043364</li>
                        <li>Room no.: 303, third floor</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <form name="complaint" method="post">
                    	<div class="row">
                    		
                    		
	                        <div class="form-group col-md-6">
	                            <label for="name">Component Type</label>
	                            <input type="name" name="ctype" required>
	                        </div>
	                        <div class="form-group col-md-6">
	                            <label for="name">Component Name</label>
	                            <input type="name" class="form-control" name="cname" srequired>
	                        </div>
	                        
	                    </div>
	                    <div class="row">
	                    <div class="form-group col-md-6">
	                            <label for="name">Component Brand</label>
	                            <input type="name" class="form-control" name="cbrand" srequired>
	                        </div>
	                       <div class="form-group col-md-6">
	                            <label for="name">Component Cost</label>
	                            <input type="number" name="ccost"  min=10 required>
	                        </div>
	                    </div>
	                    <div class="row">
	                    
	                        <div class="form-group col-md-6">
	                            <label for="name">Component Quantity</label>
	                            <input type="number" name="cqty" min=1 required>
	                        </div>
	                        
	                        <div class="form-group col-md-6">
	                            <label for="Email">Your Email</label>
	                            <input type="email" name="email" class="form-control" required>
	                        </div>
	                    </div>
	                    <button type="submit" class="btn font-weight-bold atlas-cta atlas-cta-wide cta-green my-3" name="submitpost">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- copyright -->
	<div class="jumbotron jumbotron-fluid" id="copyright">
        <div class="container">
            <div class="row justify-content-between">
            	<div class="col-md-6 text-white align-self-center text-center text-md-left my-2">
                    Copyright © 2018 Hardware Lab IIITS.
                </div>
                <div class="col-md-6 align-self-center text-center text-md-right my-2" id="social-media">
                    <img src="img/logo.png" width=50px height=50px align="right">
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- AOS -->
    <script src="js/aos.js"></script>
    <script>
      function type_change(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","ajax.php?type="+document.getElementById('type').value,false);
	xmlhttp.send(null);
	//alert(xmlhttp.responseText);
	document.getElementById('name').innerHTML=xmlhttp.responseText;
	}
	function brand_change(){
	var xmlhttp = new XMLHttpRequest();
	//alert(document.getElementById('name').value);
	xmlhttp.open("GET","ajax2.php?name="+document.getElementById('name').value,false);
	xmlhttp.send(null);
	//alert(xmlhttp.responseText);
	document.getElementById('brand').innerHTML=xmlhttp.responseText;
	}
	function name_change(){
	var xmlhttp = new XMLHttpRequest();
	//alert(document.getElementById('name').value);
	xmlhttp.open("GET","ajax3.php?name="+document.getElementById('name').value,false);
	xmlhttp.send(null);
	//alert(xmlhttp.responseText);
	document.getElementById('span').innerHTML=xmlhttp.responseText;
	}
      AOS.init({
      });
    </script>
</body>
</html>

<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

  if(isset($_POST['submitpost'])){
	
  $ctype = $_POST['ctype'];
  $cname = $_POST['cname'];
  $cbrand = $_POST['cbrand'];
  $ccost = $_POST['ccost'];
  $cqty = $_POST['cqty'];
  
  $sql = "insert into Complaints(name,type,cost,company,quantity) Values('$cname','$ctype',$ccost,'$cbrand',$cqty)";
  $result = mysqli_query($db,$sql);	

    }

}
  

  
?>
