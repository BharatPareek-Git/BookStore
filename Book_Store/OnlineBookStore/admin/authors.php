<!-- include constants for DataBase and Constants -->
<?php 
	include_once("../config/constants.php");
?>
<!-- include header part -->
<?php 
	include_once("../partials-front-end/header-menu.php");
	// Create form to add category 
?>
	<?php 
		//Author add status
		if(isset($_SESSION['auth_add_status']))
		{
			echo $_SESSION['auth_add_status'];
			unset($_SESSION['auth_add_status']);
		}

		//Author delete status
		if(isset($_SESSION['auth_id_delete']))
		{
			echo $_SESSION['auth_id_delete'];
			unset($_SESSION['auth_id_delete']);
		}

		//Author update status
		if(isset($_SESSION['auth_id_update']))
		{
			echo $_SESSION['auth_id_update'];
			unset($_SESSION['auth_id_update']);
		}

	?>

	<!-- Form Start -->
	<section class="category-div">
		<div class="category-div-form">
			<h2>Author</h2>
			<form action="" method="post">
  				<div class="mb-3">
    				<label for="category-name" class="form-label">Name</label>
    				<input type="text" class="form-control" id="category-name" name="author" required>
    			 </div>
  				<input type="submit" class="btn btn-primary" value="Add Author" name="submit">
			</form>
		</div>
	</section>
	<!-- Form End -->
	<?php

	// Check Whether Author add button is clicked or not 
	// if clicked then data is insert into DB

	if(isset($_POST['submit']))
	{
		// get the data from category form
		$author_title = $_POST['author'];
		// prevent SQL Injection
		$author_title = mysqli_real_escape_string($conn,$author_title);
		//SQL Query for adding data into Author Table
		$sql = "insert into tbl_authors (auth_name) values('$author_title')";
		
		// DB connected
		// inset Data

		//Execute the SQL Query
		$res = mysqli_query($conn,$sql);

		//check query is executed or not
		if($res==true)
		{
			// Data is Added 
			$_SESSION['auth_add_status'] = "<div class='success text-center'>Author Added Successfully</div>";
			// Rediect to this page so message will display
			// header("location:".SITEURL."admin/authors.php");//warnning so now we redirect using js
			?>

			<script type="text/javascript">
				window.location.href='<?php echo SITEURL;?>admin/authors.php';
			</script>

			<?php
		}
		else
		{
			// Data is Not Added
			$_SESSION['auth_add_status'] = "<div class='error text-center'>Author not Added!</div>";
			// Rediect to this page so message will display
			// header("location:".SITEURL."admin/authors.php");//warnning so now we redirect using js
			?>

			<script type="text/javascript">
				window.location.href='<?php echo SITEURL;?>admin/authors.php';
			</script>

			<?php
		}

	}

	// Display All Added Authors and provide option for update and delete
	// SQL Query to Fetch Data From  DB
	$sql2 = "select * from tbl_authors";

	//Execute the Query
	$res2 = mysqli_query($conn,$sql2);

	//Count Rows to check Whether we have Data in DB or not
	$count2 = mysqli_num_rows($res2);

	//Check Rows are available or not
	if($count2 > 0)
	{
		//We have Data so Display
		?>

		<div class="category-div-Display">
			<div class="category-div-Display-main">

					<table class="table table-bordered">
  							<thead>
  							 	<tr>
  							    	<th>Id</th>
  							    	<th>Author Name</th>
  							    	<th colspan="2">Action</th>
  							  	</tr>
  							</thead>
  							<tbody>
							<!-- Fetch Data -->
							<?php 

							while($row2=mysqli_fetch_assoc($res2))
							{
								$author_id = $row2['auth_id'];
								$author_title = $row2['auth_name'];

								// Display

							?>

						
  							<tr>
  							  	<th><?php echo $author_id; ?></th>
  							    <td><?php echo $author_title; ?></td>
  							    <td>
  							    	<a href="<?php echo SITEURL; ?>admin/update-author.php?auth_id=<?php echo $author_id; ?>">
  							    		<i class="fa-solid fa-square-pen fa-2xl" style="color: #3170dd;"></i>
  							    	</a>
  							    </td>
  							    <td>
  							    	<a href="<?php echo SITEURL; ?>admin/delete-author.php?auth_id=<?php echo $author_id; ?>">
  							    		<i class="fa-sharp fa-solid fa-delete-left fa-2xl" style="color: #e62b0f;"></i>
  							    	</a>
  							    </td>
  							</tr>
							<?php
					}
							?>
							</tbody>
						</table>
		<?php
	}
	else
	{
		echo "<div class='error text-center'>Author Not Found</div>";
	}
			?>

			</div>
		</div>

<!-- Footer part include -->
<?php 
	include_once("../partials-front-end/footer.php");
?>