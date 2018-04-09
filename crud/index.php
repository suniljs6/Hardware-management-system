<?php
	session_start();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3><?php $a = $_SESSION['username']; echo "WELCOME : $a"; ?></h3>
            </div>
            <div class="row">
            	
                    <span class="w3-btn"><a href="create.php" class="btn btn-success">ADD</span></a>
                
                
                    <span class="w3-btn"><a href="issue.php" class="btn btn-success">ISSUE</span></a>
                
                
                    <span class="w3-btn"><a href="/pagination/" class="btn btn-success">LOOK-AT-USERS</span></a>
                
                
                    <span class="w3-btn"><a href="/crud_complaints/" class="btn btn-success">Complaints</span></a>
                
		
                    <span class="w3-btn"><a href="/log_issue/" class="btn btn-success">Issued by me</span></a>
                
                <span style="float:right;">
		    <a href="logout.php" class="btn btn-info btn-lg">
		    	<span class="glyphicon glyphicon-log-out">&#xe163;</span> Log out
		    </a>
		</span>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>cid</th>
                      <th>type</th>
                      <th>name</th>
                      <th>company</th>
                      <th>cost</th>
                      <th>quantity</th>
                      <th>description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM Components';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['cid'] . '</td>';
                            echo '<td>'.$row['type'].'</td>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['company'] . '</td>';
                            echo '<td>'. $row['cost'] . '</td>';
                            echo '<td>'. $row['quantity'] . '</td>';
                            echo '<td>'. $row['description'] . '</td>';
                            echo '<td><a class="btn btn-success" href="update.php?id='.$row['cid'].'&type='.$row['type'].'&name='.$row['name'].'&brand='.$row['company'].'&cost='.$row['cost'].'&quantity='.$row['quantity'].'&description='.$row['description'].'">update</a></td>';
                            echo '<td><a class="btn btn-danger" href="delete.php?id='.$row['cid'].'">Delete</a></td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
