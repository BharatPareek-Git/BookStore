<!-- include constants so DataBase and constant are used -->
<?php 
	include_once("../config/constants.php");
?>
<!-- include header part -->
<?php 
	include_once("../partials-front-end/header-menu.php");
	// Create form to Update Author 
?>
<!-- Fetch Data From DB -->
<?php 
	// Check category_id is selected or not
	if(isset($_GET['auth_id']))
	{
		// auth_id is set
		// SQL Query
		$auth_id = $_GET['auth_id'];
		$sql = "select * from tbl_authors where auth_id=$auth_id";
		
		// Execute SQL Query
		$res = mysqli_query($conn,$sql);

		// Count Available rows
		$count = mysqli_num_rows($res);

		// Check Data is Available or not
		if($count == 1)
		{
			// Data is available 
			// Fetch Data
			$row = mysqli_fetch_assoc($res);
			$auth_title = $row['auth_name'];
			
			//Display Previous Data in form and option for edit and update
			?>

			<!-- Update Form Start -->
			<section class="category-div">
				<div class="category-div-form">
					<h2>Author</h2>
					<form action="" method="post">
  						<div class="mb-3">
  							<label for="category-id" class="form-label">Id</label>
    						<input type="text" class="form-control" id="category-id" name="auth_id" readonly value="<?php echo $auth_id; ?>">
    						<label for="category-name" class="form-label">Title</label>
    						<input type="text" class="form-control" id="category-name" name="auth_title" required value="<?php echo $auth_title; ?>">
    					 </div>
    					 <input type="hidden" value="<?php echo $auth_id; ?>" name="auth_id">
  						<input type="submit" class="btn btn-primary" value="Update Author" name="submit">
					</form>
				</div>
			</section>
			<!--Update Form End -->

			<?php

		} 
		else
		{
			// Data is not available for this auth_id 
			// Display error message and redirect to authors.php page
			$_SESSION['auth_id_update'] = "<div class='error text-center'>Something went wrong with auth_id (Invaild auth_id)</div>";
			//Redirect using js
			?>	

			<script type="text/javascript">
				window.location.href='<?php echo SITEURL; ?>admin/authors.php';
			</script>

			<?php

		}

	}
	else
	{
		// auth_id is not set
		// Error Message Display and Redirect to authors.php page
		$_SESSION['auth_id_update'] = "<div class='error text-center'>Something went wrong with auth_id</div>";
		//Redirect using js
		?>

		<script type="text/javascript">
			window.location.href='<?php echo SITEURL; ?>admin/authors.php';
		</script>

		<?php
	}
	
?>

<?php 
	// check whether update button is clicked 
	if(isset($_POST['submit']))
	{
		// Get data from form
		// $auth_id = $_POST['auth_id'];
		$author_title = $_POST['auth_title'];
		$author_title = mysqli_real_escape_string($conn,$author_title);
		// Update Button clicked
		// Update Query 
		$sql2 = "update tbl_authors set auth_name='$author_title' where auth_id=$auth_id";	
		//Execute SQL Query
		$res2 = mysqli_query($conn,$sql2);
		//check whether Query is Successfully Executed or not
		if($res2 == TRUE)
		{
			// Success Message
			$_SESSION['auth_id_update'] = "<div class='success text-center'>$author_title is Successfully Updated</div>";
			// Redirect to authors.php page
			?>

			<script type="text/javascript">
				window.location.href='<?php echo SITEURL; ?>admin/authors.php';
			</script>

			<?php
		}
		else
		{
			// Error Message
			$_SESSION['auth_id_update'] = "<div class='error text-center'>$auth_title is not Updated</div>";
			// Redirect to authors.php page
			?>

			<script type="text/javascript">
				window.location.href='<?php echo SITEURL; ?>admin/authors.php';
			</script>

			<?php
		}
	}
?>
