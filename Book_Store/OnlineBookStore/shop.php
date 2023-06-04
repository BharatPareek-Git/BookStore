<!-- Header file include -->
<?php 
	include_once("partials-user-front-end/user-header.php");
?>
		<!-- All Product as per author name -->
		<!-- author and Product Quickview -->
<section class="container p-4">
	<div class="container-80">
		<div class="main-content-table"> 
			<h5 class="p-2">Author</h5>      
			<table class="table table-hover table-bordered">
				<tbody>
					<?php 
    				// Fetch Data from DB
					$sql_author = "select * from tbl_authors";
    							// Execute SQL Query
					$res_author = mysqli_query($conn,$sql_author);
    							// Check Whether We have authors to display or not
					$count_author = mysqli_num_rows($res_author);
    							// Check count is greate zero 
					if($count_author > 0)
					{
    								// We have author
    								// Display author data
						while($row_author=mysqli_fetch_assoc($res_author))
						{
							?>
							<tr>
								<td>
									<!-- change need -->
									<a href="<?php echo SITEURL; ?>author-products.php?id=<?php echo $row_author['auth_id']; ?>" class="tbl-a-style-remove">
										<?php echo $row_author['auth_name']; ?>
									</a>
								</td>	
							</tr>
							<?php
						}

					}
					else
					{
    								// We not have category
						echo "<tr><td class='error text-center'>Categories not found</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>

		<!-- Products -->
		<div class="grid-container">
			<?php 
  						$page = $_GET['page'] ?? 1; // null coalescing operator
  						$products_on_page = 3;
  						$skip = ($page-1)*$products_on_page;
  						// Fetch Product
  						$sql_product = "select * from tbl_products where product_quantity>0 limit $skip,$products_on_page";
  						// Execute SQL Query
  						$res_product = mysqli_query($conn,$sql_product);
  						// Count products
  						$count_product = mysqli_num_rows($res_product);

  						// Check Products are available or not
  						if($count_product > 0)
  						{
  							// Products are available for display
  							while($row_product=mysqli_fetch_assoc($res_product))
  							{
  								?>
  								<div class="container mt-3 grid-item">
  									<div class="card p-1" style="width:100%; min-width: 300px;">
  										<!-- Image Display -->
  										<?php 
  												// Check Whether image is available or not
  										if($row_product['product_image']!="")
  										{
  													// Image is available
  													// Display an image
  											?>
  											<a href="<?php echo SITEURL; ?>product-detail.php?pid=<?php echo $row_product['product_id']; ?>">
  												<img class="card-img-top" src="<?php echo SITEURL; ?>images/product_images/<?php echo $row_product['product_image']; ?>" alt="Card image" style="width:100%">
  											</a>
  											<?php
  										}
  										else
  										{
  													// Image is not availble
  													// Dispaly an error message
  											echo "<p class='error text-center'>Image is not found!</p>";
  										}
  										?>

  										<div class="card-body">
  											<h5 class="card-title text-primary">
  												<a href="<?php echo SITEURL; ?>product-detail.php?pid=<?php echo $row_product['product_id']; ?>" class="text-decoration-remove-a">
  													<?php
  														// Book Title 
  														echo $row_product['product_title']; 

  														$auth_id = $row_product['auth_id'];
	  													// Fetch Data from DB for author name
    	              									$sql_author = "select * from tbl_authors where auth_id=$auth_id";
                  										// Execute SQL Query
                  										$res_author = mysqli_query($conn,$sql_author);
                  										// Check Whether We have author to display or not
                  										$count_author = mysqli_num_rows($res_author);
                  										
                  										// Check count is greate zero 
                  										if($count_author > 0)
                  										{
                  										  // We have author 
                  										  // Display author data
                  										  while($row_author=mysqli_fetch_assoc($res_author))
                  										  {
                      										?>
                        									<tr>
                          										<td>
                          											<small>
                          												<a href="#" class="tbl-a-style-remove">
                              											<?php echo  $row_author['auth_name']; ?>
                            										</a>
                          											</small>
                          										</td> 
                          									</tr>
                      	<?php
                    }
                    
                  }
                  else
                  {
                    // We not have category
                    echo "<tr><td class='error text-center'>Categories not found</td></tr>";
                  }
                  ?>
  												</a>
  												<span class="pull-right">
  													<a href="#">
  														<i class="fa-regular fa-heart"></i>
  													</a>
  												</span>
  											</h5>
  											<p class="card-text">
  												<i class="fa-sharp fa-solid fa-indian-rupee-sign"></i>
  												<?php echo $row_product['product_price'] ?>
  											</p>
  											<p class="card-text over-flow">
  												<?php echo $row_product['product_short_description'] ?>
  											</p>
  											<a href="<?php SITEURL; ?>manage-cart.php?pid=<?php echo $row_product['product_id']; ?>" class="btn btn-primary">Add to cart</a>
  										</div>
  									</div>
  								</div>
  								<?php
  							}
  							
  						}
  						else
  						{
  							// Products are not available
  							echo "<div class='text-center error'>Products are not Found</div>";
  						}
  						?>		
  					</div>
  					<!-- Pagination  -->
  					<div class="  mt-4">
  						
  					
  					<ul class=" justify-content-center pagination">
  						<?php
					// Pagination logic
  						$sql_product_pagination = "select * from tbl_products where product_quantity>0";
  						$res_product_pagination = mysqli_query($conn,$sql_product_pagination);
  						$count_product_pagination = mysqli_num_rows($res_product_pagination);
  						$pages = round($count_product_pagination/$products_on_page);
  						if($page-1>0){
  							?>
  							<li class="page-item"><a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a></li>
  							<?php
  						}
  						else{
  							?>
  							<li class="page-item"><a class="page-link disabled">Previous</a></li>
  							<?php
  						}
  						$start = $page-2 <= 0 ? 1 : $page -2;
  						$end = $page+2 >= $pages ? $pages : $page+2;
  						for($i=$start;$i<=$end;$i++)
  						{
  							?>
  							<li class="page-item"><a class="page-link <?php if($i==$page) echo 'active'; ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  							<?php
  						}
  						?>

  						<?php
  						if($page+1<=$pages){
  							?>
  							<li class="page-item"><a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a></li>
  							<?php
  						}
  						else{
  							?>
  							<li class="page-item"><a class="page-link disabled">Next</a></li>
  							<?php
  						}
  						?>
  						<?php
  						?>
  					</ul>
  					</div>
  				</section>

<!-- Include Footer Section -->
<?php 
	include_once("partials-user-front-end/user-footer.php")
?>