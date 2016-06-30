<?php include("header.php");

 //Redirect user to login page if he has not logged in
        if(!isset($_SESSION['ID_USER']))
        {
            include './pages/ErrorPage.php';
            exit;
        }
         $con = new mysqli("localhost","root", "", "e_comm_db");
         // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              

?> 
<div class="wishlist-concept area-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<div class="section-title no-margin"><h2>Mon Compte</h2></div>
						<aside>
							<div class="wishlist-left-sidebar">
								<ul>
									
									<li><a href="#">Information du compte</a></li>
									<li><a href="#">Adresse</a></li>
									<li><a href="#">Mes Commandes</a></li>
									<li><a href="#">Mes Favoris</a></li>
								</ul>
							</div>
						</aside>
					</div>
					<div class="col-sm-12 col-lg-9 col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h1>Mes Produits</h1>
                                </div>
                            </div>
                        </div>
                                       <form action="pages/product_dba.php" method="post" >
                                           <input type="hidden" name="store" value="<?=$_GET['store']?>" />
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th class="product-img">Image Produit</th>
										<th>Produit détail et commentaire</th>
										<th class="text-center add-cart-info">Traitement</th>
										<th></th>
									</tr>
								</thead>
                                                                <tbody>
                                                                    
                                                               
                                                                <?php
                                                                
                                                                
                                                                if(!isset($_GET['store']))
                                                                {
                                                                    echo "  <div id='order-history'>"
                                                                    . " <p class='warning'>ERROR :Check your store !!<p>"
                                                                            . "</div>";
                                                                    die();
                                                                }  else {
                                                                    $Store = $_GET['store']; 
                                                                   }
                                                                
                                                                $Costumer = (int) $_SESSION['ID_USER'];
                                                               $query ="SELECT productID, p.`name`, `description`, `price`, `quantity` , `url_image` "
                                                                    . "FROM `product` p , store s, image i "
                                                                    . "              WHERE p.id_store = s.storeID  AND p.id_image = i.imageID "
                                                                    . "                     AND id_store = $Store AND id_costumer = $Costumer   order by 1 desc ";
        
                                                                 $result = mysqli_query($con, $query);
                                                                  if (!$result) {
                                                                    echo 'MySQL Error: ' . mysqli_error($con);
                                                                        exit;
                                                                   }  

                                                                
                                                                   while ($row = mysqli_fetch_assoc($result))
                                                                   {
                                                                            
                                                                       ?>
                                                                
									<tr>
										<td class="product-img">
                                                                                    <a href="#" class="tb-img"><img src="pages/<?=$row['url_image']?>" class="img-responsive" alt=""></a>
										</td>
										<td>
											<h6><a href="product-details.html"><?=$row['name']?></a></h6>
											<p><?=$row['description']?></p>
										</td>
                                                                                <td class="text-center add-cart-info">
											<div class="price-box">
                                                                                                <span class="selected-product">  <input type="checkbox" name="productID[]" value="<?=$row['productID']?>" />  </span>
												<span class="old-price"><?=$row['price']?></span>
												<span class="special-price"><?=$row['price']?></span>
											</div>
											<form action="#" method="post" class="wishlist-qty">
												<input type="text" name="quantity" value="<?=$row['quantity']?>" maxlength="12">
                                                                                                <a href="pages/product_dba.php?type=edit&item=<?=$row['productID']?>&store=<?=$Store?>"><button class="button btn-cart"  type="button"><span>Modifier</span></button></a> 
											</form>
											
										</td>
                                                                <?php
                                                                
                                                                   }
                                                                   
                                                                ?>
                                                                
                                                                
								<!-- <tbody>
									<tr>
										<td class="product-img">
                                                                                    <a href="product-details.html" class="tb-img"><img src="pages/uploads/rech.jpg" class="img-responsive" alt=""></a>
										</td>
										<td>
											<h6><a href="product-details.html">Donec ac tempus </a></h6>
											<p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis. </p>
											<textarea placeholder="Please, enter your comments..."></textarea>
										</td>
										<td class="text-center add-cart-info">
											<div class="price-box">
												<span class="old-price">$256.87</span>
												<span class="special-price">$156.87</span>
											</div>
											<form action="#" method="post" class="wishlist-qty">
												<input type="text" name="quantity" value="1" maxlength="12">
												<button class="button btn-cart" type="button"><span>Add to Cart</span></button>
											</form>
											<a class="edit" href="#">Edit</a>
										</td>
										<td class="p-action"><a href="#"></a></td>
									</tr>
									<tr>
										<td class="product-img">
											<a href="product-details.html" class="tb-img"><img src="img/wishlist/2.jpg" class="img-responsive" alt=""></a>
										</td>
										<td>
											<h6><a href="product-details.html">Aliquam consequat</a></h6>
											<p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis. </p>
											<textarea placeholder="Please, enter your comments..."></textarea>
										</td>
										<td class="text-center add-cart-info">
											<div class="price-box">
												<span class="special-price">$156.87</span>
											</div>
											<form action="#" method="post" class="wishlist-qty">
												<input type="text" name="quantity" value="1" maxlength="12">
												<button class="button btn-cart" type="button"><span>Add to Cart</span></button>
											</form>
											<a class="edit" href="#">Edit</a>
										</td>
										<td class="p-action"><a href="#"></a></td>
									</tr>
								 -->
                                                                 </tbody>
							</table>
						</div>
                        <div class="all-cart-buttons">
                            <a href="addProduct.php?store=<?=$Store?>"> <button class="button btn-cart" type="button"><span>Ajouter plus</span></button></a>
                            <button class="button btn-cart" name="deleteProduct" type="submit"><span>Supprimer</span></button>
                          
                        </div>
                                        </form>
						<div class="back-button">
							<a href="#"><small>« </small> Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php include("footer.php"); ?>