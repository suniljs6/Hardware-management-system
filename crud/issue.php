<?php
session_start();
?>
<!DOCTYPE html>


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
                        <h3>ISSUE A Component</h3>
                    </div>
             
                    <form class="form-horizontal" action="#" method="post">
                    <div class="control-group">
                        <label class="control-label">sid</label>
                        <div class="controls">
                            <input name="sid" type="number"  placeholder="type" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">type</label>
                        <div class="controls">
                            <input name="type" type="text"  placeholder="type" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name"  required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Brand</label>
                        <div class="controls">
                            <input name="brand" type="text" placeholder="brand"  required>
                            </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label" >Quantity</label>
                        <div class="controls">
                            <input name="quantity" type="number"  placeholder="quantity"  required min=1>
                        </div>
                      </div>
                      
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">ISSUE</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $typeError = null;
        $nameError = null;
        $brandError = null;
        $quantityError = null;
        
         
        // keep track post values
        $sid=$_POST['sid'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        //$cost = $_POST['cost'];
        $quantity = $_POST['quantity'];
        $issued_by=$_SESSION['username'];
        $issue_date=date('Y-m-d');
       	$due_date=date('Y-m-d', strtotime($issue_date. ' + 15 days'));
         
         
        // validate input
        $valid = true;
        if (empty($type)) {
            $typeError = 'Please enter type';
            $valid = false;
        }
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($brand)) {
            $brandError = 'Please enter brand';
            $valid = false;
        }
        if (empty($quantity)) {
            $quantityError = 'Please enter quantity';
            $valid = false;
        }
        
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $qq="select cid,quantity from Components where type=?  and name=? and company=?";
            $pp=$pdo->prepare($qq);
            $pp->execute(array($type,$name,$brand));
            $result1 = $pp->fetch(PDO::FETCH_ASSOC);
            //print_r($result1);
            $fcid=$result1['cid'];
            $fqty=$result1['quantity'];
            if($quantity<=$fqty){
            
            $sql2 = "select * from issued_components where sid=? and cid=?";
            $qqq = $pdo->prepare($sql2);
            $qqq->execute(array($sid,$fcid));
            if($qqq->rowCount()){
            	$result2 = $qqq->fetch(PDO::FETCH_ASSOC);
            	$update_qt = $result2['quantity']+$quantity;
            	$sql3 = "update issued_components set quantity=? where sid=? and cid=?";
            	$qq = $pdo->prepare($sql3);
            	$qq->execute(array($update_qt,$sid,$fcid));
            	$fqty=$fqty-$quantity;
            	$sql4 = "update Components set quantity=? where cid=?";
            	$qq = $pdo->prepare($sql4);
            	$qq->execute(array($fqty,$fcid));
            	
            	
            }
            else{
            $sql2 = "select sid from Student where ? in (select sid from Student)";
            $qq = $pdo->prepare($sql2);
            $qq->execute(array($sid));
            $resulttt = $qq->fetch(PDO::FETCH_ASSOC);
            if(!empty($resulttt)){
		    $sql = "INSERT INTO issued_components (sid,cid,quantity,issue_date,due_date,fine,issued_by) values(?, ?,?, ?,?,?,?)";
		    $q = $pdo->prepare($sql);
		    $q->execute(array($sid,$fcid,$quantity,$issue_date,$due_date,0,$issued_by));
		    if($q){
			    Database::disconnect();
			    header("Location: index.php");
			}
			else
				echo "error";
		}
	else
		echo "error";            
		}
	  }
            else
           	echo "ALERT!! enter less than $fqty";
           
           }
        
    }
?>

