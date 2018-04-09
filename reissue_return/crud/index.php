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
            <div class="row">
                <h3><?php $abc=$_SESSION['username']; echo "Welcome:$abc";?></h3>
            </div>
            <p style="float:right;">
		    <a href="logout.php" class="btn btn-info btn-lg">
		    	<span class="glyphicon glyphicon-log-out">&#xe163;</span> Log out
		    </a>
	    </p>
            	
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>cid</th>
                      <th>quantity</th>
                      <th>issue_date</th>
                      <th>due_date</th>
                      <th>fine</th>
                      <th>issued_by</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $r = $_SESSION['id'];
                   if(empty($r))
                   	echo "sdfsaf";
                   $sql = "SELECT * FROM issued_components where sid=$r";
                   $result = mysqli_query($db,$sql);
                   $a = mysqli_fetch_assoc($result);
                   while($a) {
                            echo '<tr>';
                            echo '<td>'. $a['cid'] . '</td>';
                            echo '<td>'.$a['quantity'].'</td>';
                            echo '<td>'. $a['issue_date'] . '</td>';
                            echo '<td>'. $a['due_date'] . '</td>';
                            echo '<td>'. $a['fine'] . '</td>';
                            echo '<td>'. $a['issued_by'] . '</td>';
                            echo '<td><a class="btn btn-success" href="return.php?cid='.$a['cid'].'">return</a></td>';
                            echo '<td><a class="btn btn-danger" href="reissue.php?cid='.$a['cid'].'&issue_date='.$a['issue_date'].'">Re-Issue</a></td>';
                            echo '</tr>';
                            $a = mysqli_fetch_assoc($result);
                   }
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
