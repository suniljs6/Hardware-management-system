<?php
	session_start();
	$r = $_SESSION['id'];
	
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Return a component</h3>
                    </div>
             
                    <form class="form-horizontal" action="return.php?cid=<?php echo $_GET['cid']?>" method="post">
                      <div class="control-group">
                        <label class="control-label">Quantity</label>
                        <div class="controls">
                            <input name="quantity" type="number" required>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
<?php
    require 'database.php';
 
    $quantity = null;
    if ( !empty($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
    
		$a = $_GET['cid'];
		$sql = "select * from issued_components WHERE cid = $a and sid=$r";
		$re = mysqli_query($db,$sql);
		$result = mysqli_fetch_assoc($re);
		if($result){
		$number =  $result['quantity'];
		if($number<=$quantity){
			
			$b = $result['issue_date'];
			$c = $result['due_date'];
			$d = $result['issued_by'];
			$e = $result['fine'];
			$sql1 = "delete from issued_components where sid=$r and cid=$a";
			$query = mysqli_query($db,$sql1);
			if($query){
				//echo "deleted";
				header("location:index.php");
				
			}
			else{
				echo mysqli_error($db);
			}
		}
		else{
		    	$num_result = abs($quantity-$number);
		    	$sql1 = "update issued_components set quantity=$num_result where cid = $a and sid=$r";
		    	$query = mysqli_query($db,$sql1);
		    	if($query){
		    		header("location:index.php");
		    	}
		    	else{
		    		echo "server down";	    	
		    	}
		}
		}
    }
    //header("Location: index.php");
?>
