<?php
session_start();
?>
<?php
include('db.php');

//for total count data
$countSql = "SELECT COUNT(rid) FROM issued_components";  
$tot_result = mysqli_query($conn, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);
$issuer=$_SESSION['username'];
//for first time load data
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
$sql = "SELECT * FROM issued_components where issued_by='$issuer' ORDER BY rid ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="dist/simplePagination.css" />
<link   href="css/bootstrap.min.css" rel="stylesheet">
<script src="dist/jquery.simplePagination.js"></script>
<title></title>
<script>
</script>
</head>
<body>
<div class="container" style="padding-top:20px;">
<table class="table table-bordered table-striped">  
<thead>  
<tr>
<?php
	$cols = mysqli_fetch_fields($rs_result);
	for($i=1;$i<sizeof($cols);$i++){
		$r = $cols[$i]->name;
		echo "<th>$r</th>";
	}
?>  
</tr>  
</thead>  
<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
?>  
            <tr>  
            <td><?php echo $row["sid"]; ?></td>  
	    <td><?php echo $row["cid"]; ?></td>
	    <td><?php echo $row["quantity"]; ?></td>
	    <td><?php echo $row["issue_date"]; ?></td>
	    <td><?php echo $row["due_date"]; ?></td>
	    <td><?php echo $row["fine"]; ?></td>
	    <td><?php echo $row["issued_by"]; ?></td>	      
            </tr>  
<?php  
};  
?>
</tbody> 
</table>
<nav><ul class="pagination">
<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
            if($i == 1):?>
            <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
            <?php else:?>
            <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
        <?php endif;?>          
<?php endfor;endif;?>
</ul></nav>
<a class="btn" href='/crud/index.php'>GO BACK</a>
</div>

</body>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : 1,
		onPageClick : function(pageNumber) {
			jQuery("#target-content").html('loading...');
			jQuery("#target-content").load("pagination.php?page=" + pageNumber);
		}
    });
});
</script>
