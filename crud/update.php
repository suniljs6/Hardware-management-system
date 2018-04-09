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
                        <h3>Update a component</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $_GET['id']?>" method="post">
                      <div class="control-group">
                        <label class="control-label">type</label>
                        <div class="controls">
                            <input name="type" type="text"  value="<?php echo $_GET['type'];?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"   value="<?php echo $_GET['name'];?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Brand</label>
                        <div class="controls">
                            <input name="brand" type="text"  value="<?php echo $_GET['brand'];?>" required>
                            </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Cost</label>
                        <div class="controls">
                            <input name="cost" type="number"  value="<?php echo $_GET['cost'];?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Quantity</label>
                        <div class="controls">
                            <input name="quantity" type="number"   value="<?php echo $_GET['quantity'];?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <textarea name="description" value="<?php echo $_GET['description'];?>" required><?php echo $_GET['description'];?></textarea>
                            <!--<input name="description" type="text" style="padding:30px"  value="<?php echo $_GET['description'];?>" required>-->
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
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $typeError = null;
        $nameError = null;
        $brandError = null;
        $costError = null;
        $quantityError = null;
        $descriptionError = null;
         
        // keep track post values
        $type = $_POST['type'];
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $cost = $_POST['cost'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
         
       // echo "$id"; 
         
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
        if (empty($cost)) {
            $costError = 'Please enter cost';
            $valid = false;
        }
        if (empty($description)) {
            $descriptionError = 'Please enter description';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Components  set type = ?,name = ?, company = ?, cost =?,quantity=?,description=? WHERE cid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($type,$name,$brand,$cost,$quantity,$description,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } 
?>
