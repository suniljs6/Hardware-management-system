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
 
    $id = null;
    if ( !empty($_POST['cid'])) {
        $id = $_POST['cid'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $quantity = $_POST['quantity'];
        $valid = true;
        
        if (empty($quantity)) {
            $quantityError = 'Please enter quantity';
            $valid = false;
        }
        // update data
        if ($valid) {
        	echo "$id";
            /*$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Components  set type = ?,name = ?, company = ?, cost =?,quantity=?,description=? WHERE cid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($type,$name,$brand,$cost,$quantity,$description,$id));
            Database::disconnect();
            header("Location: index.php");
            */
        }
    } 
?>
