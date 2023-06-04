<!-- include constants so DataBase and constant are used -->
<?php 
	include_once("../config/constants.php");
?>
<?php 
	// First check whether author_id is set or not 
	// When author_id is set by URL so method is used to check is GET
	if(isset($_GET['auth_id']))
	{
		// author_id is set
		// now author is delete
		// SQL Query
		$auth_id = $_GET['auth_id'];
		$sql = "select * from tbl_authors where auth_id=$auth_id";

		//Execute the query
		$res = mysqli_query($conn,$sql);

		//count available rows for Query
		$count = mysqli_num_rows($res);

		// check row is found or not 
		// as we know auth_id is unique and so here we get only one unique row for every auth_id
		if($count == 1)
		{
			// Row is found
			// SQL Query for Delete
			$sql2 = "delete from tbl_authors where auth_id=$auth_id";

			// Execute Query
			$res2 = mysqli_query($conn,$sql2);

			// Check Whether Query is Executed or not
			if($res2 == TRUE)
			{
				// SQL Query is Execueted and Deletion is complete
				$_SESSION['auth _id_delete'] = "<div class='success text-center'>Author Successfully Deleted</div>";
				// Redirect to authors.php so error message will display
				?>

				<script type="text/javascript">
					window.location.href='<?php echo SITEURL; ?>admin/authors.php';
				</script>

				<?php
			}
			else
			{
				// SQL Query is not Execueted
				$_SESSION['auth_id_delete'] = "<div class='error text-center'>Something went wrong !</div>";
				// Redirect to authors.php so error message will display
				?>

				<script type="text/javascript">
					window.location.href='<?php echo SITEURL; ?>admin/authors.php';
				</script>

				<?php
			}


		}
		else
		{	
			// Requried author not exists in DB so deletion is  not performed and also display an error
			$_SESSION['auth_id_delete'] = "<div class='error text-center'>Author Not Found (Invaild Author)</div>";
			//Redirect to authors.php so error message will display
			?>
			<script type="text/javascript">
				window.location.href='<?php echo SITEURL; ?>admin/authors.php';
			</script>	
			<?php

		}
	} 
	else
	{
		// echo "error";	 
		// auth_id is set
		// display error message (auth_id is not set)
		$_SESSION['auth_id_delete'] = "<div class='error text-center'>Something went wrong (auth_id is not set)</div>";
		// Now Redirect to authors.php page so error mesage will display and redirect using js 
		echo "error";
		?>

		<script type="text/javascript">
			window.location.href='<?php echo SITEURL; ?>admin/authors.php';
		</script>

		<?php
	}
?>