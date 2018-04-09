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
                      <th>name</th>
                      <th>type</th>
                      <th>cost</th>
                      <th>company</th>
                      <th>quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $r = $_SESSION['id'];
                   if(empty($r))
                   	echo "sdfsaf";
                   $sql = "SELECT * FROM Complaints";
                   $result = mysqli_query($db,$sql);
                   $a = mysqli_fetch_assoc($result);
                   while($a) {
                            echo '<tr>';
                            echo '<td>'. $a['name'] . '</td>';
                            echo '<td>'.$a['type'].'</td>';
                            echo '<td>'. $a['cost'] . '</td>';
                            echo '<td>'. $a['company'] . '</td>';
                            echo '<td>'. $a['quantity'] . '</td>';
                            echo '<td><a class="btn btn-success" href="delete.php?cid='.$a['rid'].'">ACCEPT</a></td>';
                            echo '</tr>';
                            $a = mysqli_fetch_assoc($result);
                   }
                  ?>
                  </tbody>
            </table>
	<a class="btn" href='/crud/index.php'>GO BACK</a>
        </div>
    </div> <!-- /container -->
  </body>
</html>
