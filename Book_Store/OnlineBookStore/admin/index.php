<!-- include constants for DataBase and Constants -->
<?php 
	include_once("../config/constants.php");
?>
<!-- include header part -->
<?php 
	include_once("../partials-front-end/header-menu.php");
?>
<?php 
	echo $greeting;
 ?>
 <!-- Sales Report -->
 <div id="sales-report">
 	<?php 
 		// Report 
 		$sql_order = "select * from tbl_orders";
    	// Execute SQL Query
		$res_order = mysqli_query($conn,$sql_order);
		$count_order = mysqli_num_rows($res_order);

		$revenue = 0;
 		if($count_order > 0)
 		{
 			while($row_order=mysqli_fetch_assoc($res_order))
 			{
 				$revenue = $revenue + $row_order['order_amount']; 
 			}
 		}
 	?>
 	<div id="count-product-sale">
 		<p>No of Orders</p>
 		<?php 
    		// Display no of orders 
 			echo $count_order;
 		?>
 	</div>
 	<div id="revenue-generated">
 		<p>Total Revenue</p>
 		<?php 
 			// Display Revenue
 			echo $revenue;
 		?>
 	</div>
 </div>
<!-- Footer part include -->
<?php 
	include_once("../partials-front-end/footer.php");
?>

