<?php
include('db.php');

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM Student ORDER BY sid ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql); 
?>

<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
?>  
            <tr>  
            <td><?php echo $row["sid"]; ?></td>  
            <td><?php echo $row["name"]; ?></td>  
	    <td><?php echo $row["email"]; ?></td>
	    <td><?php echo $row["password"]; ?></td>
	    <td><?php echo $row["gender"]; ?></td>
	    <td><?php echo $row["phone"]; ?></td>
	    <td><?php echo $row["category"]; ?></td>	  
            </tr>  
<?php  
};  
?>
