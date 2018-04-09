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
                        <h3>Reissue a component</h3>
                    </div>
             
                    <form class="form-horizontal" action="reissue.php?cid=<?php echo $_GET['cid']?>" method="post">
                      <div class="control-group">
                        <label class="control-label">Date-to-reissue</label>
                        <div class="controls">
                            <input name="date" type="date" required value=<?php if(!empty($_GET['issue_date'])) echo $_GET['issue_date'];?>>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Reissue</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

<?php
	if(!empty($_POST)){
		 require 'database.php';
		 $date = $_POST['date'];
		 $cid = $_GET['cid'];
		 $r = $_SESSION['id'];
		 $res=date('Y-m-d', strtotime($date. ' + 15 days'));
		 //echo $res;
		 $sql2 = "select fine,due_date from issued_components where sid=$r and cid=$cid";
		 $ress = mysqli_query($db,$sql2);
		 $row = mysqli_fetch_assoc($ress);
		 if($row){
		 	$due_date = $row['due_date'];
		 	$fine = $row['fine'];
		 	if($fine==0 || $due_date>=date('Y-M-H')){
		 		$sql = "update issued_components set issue_date='$date',due_date='$res' where sid=$r and cid=$cid";
				 $res = mysqli_query($db,$sql);
				 if($res){
				 	header("location:index.php");
				 }	
		 	}
		 	else{
		 		echo "please pay your debt";
		 	}
		 }
		 else{
		 	echo "record not found";
		 }
		 
		 
		 
	}
?>
