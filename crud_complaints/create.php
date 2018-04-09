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
                        <h3>Add a component</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group">
                        <label class="control-label">type</label>
                        <div class="controls">
                            <input name="type" type="text"  placeholder="type" value="<?php echo !empty($type)?$type:'';?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Brand</label>
                        <div class="controls">
                            <input name="brand" type="text" placeholder="brand" value="<?php echo !empty($brand)?$brand:'';?>" required>
                            </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Cost</label>
                        <div class="controls">
                            <input name="cost" type="number"  placeholder="Cost" value="<?php echo !empty($cost)?$cost:'';?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Quantity</label>
                        <div class="controls">
                            <input name="quantity" type="number"  placeholder="quantity" value="<?php echo !empty($quantity)?$quantity:'';?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <textarea name="description" value="<?php echo !empty($description)?$description:'';?>" required></textarea>
                            <!--<input name="description" type="text"  placeholder="description" value="<?php echo !empty($description)?$description:'';?>" required>-->
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
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Components (type,name,company,cost,quantity,description) values(?, ?, ?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($type,$name,$brand,$cost,$quantity,$description));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>

