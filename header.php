
        <?php 
    // On démarre la session AVANT d'écrire du code HTML
            session_start();

        ?>
		

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Smart eCommerce Express</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		
		<!-- Google Fonts
		============================================ -->		
        <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,900,700,700italic,300' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="lib/nivo-slider/css/nivo-slider.css" type="text/css" />
		<link rel="stylesheet" href="lib/nivo-slider/css/preview.css" type="text/css" media="screen" />
        
		<!-- Fontawsome CSS
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="css/jquery-ui.css">
        
		<!-- meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="css/animate.css">
        
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="css/style.css">
        
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        
		<!-- modernizr JS
		============================================ -->		
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    </head>
    <body>
        

 
            <!--Header Start-->
        <header>
            <div class="header-top">
                <div class="container">
                    <div class="header-container">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <div class="header-contact">
                                    <span class="email">Email:  <?php if(isset($_SESSION["email"])){ echo $_SESSION["email"]; } else { ?> smartecommerce@gmail.com.com <?php }  ?> </span> / <span class="phone">Téléphone: +21261457568</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="currency-language">
                                    <div class="currency-menu">
                                        <ul>
                                            <li><a href="#">Maroc <i class="fa fa-angle-down"></i></a>
                                                <ul class="currency-dropdown">
                                                    <li><a href="#">Maroc</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="language-menu">
                                        <ul>
                                            <li><a href="#">Français <i class="fa fa-angle-down"></i></a>
                                                <ul class="language-dropdown">
                                                    <li><a href="#">Français</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="account-menu">
                                        <ul>
                                            <li><a href="account.php">Mon Compte <i class="fa fa-angle-down"></i></a>
                                                <ul class="account-dropdown">
													<li><a href="account.php">Mon Espace</a></li>
													<li><a href="addproduct.php">Mon Store</a></li>
                                                    <li><a href="#">Mon Désire</a></li>
                                                    <li><a href="#">Mon Panier</a></li>
                                                    <li><a href="#">Checkout</a></li>
                                                    <li><a href="pages/account.php">  <?php if(isset($_SESSION['ID_USER'])) echo "Log Out"; else echo "Login";  ?>   </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="header-main">
                <div class="container">
                    <div class="header-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="logo">
                                    <a href="index.php"><img src="img//logo/logo.png" alt="MOZAR"></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-8">
                                <div id="search-category">
                                    <form class="search-box" action="#" method="post">
                                        <div class="search-categories">
                                            <div class="search-cat">
											
											<?php  

									
												 $con = new mysqli("localhost","root", "", "e_comm_db");
												 // Check connection
													if (mysqli_connect_errno())
													  {
													  echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }


?>
											
										    <select class="category-items" name="category">
                                                                            <option value="">Toute Categorie</option>
                                                                        <?php
                                                                          $query =  "select categoryID , name from category ";
                                                                          
                                                                           $result = mysqli_query($con, $query);
                                                                        if (!$result) {
                                                                         echo 'MySQL Error: ' . mysqli_error($con);
                                                                             exit;
                                                                        }  
                                                                        
                                                                         while ($row = mysqli_fetch_assoc($result))
                                                                   {
                                                         
                                                                        ?>
                                                                        
                                                                        <option value="<?=$row['categoryID']?>"><?=$row['name']?></option>
                                                                   <?php }  ?>
                                                                    </select>

                                  
                                            </div>
                                        </div>
                                        <input type="search" placeholder="Chercher ici..." id="text-search" name="search">
                                        <button id="btn-search-category" type="submit">
                                            <i class="icon-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4">
                                <ul class="header-r-cart">
                                    <li><a class="cart" href="cart.html">Mon Panier:X items</a>
                                        <div class="mini-cart-content">
                                            <div class="cart-products-list">
                                                <div class="cart-products">
                                                    <div class="cart-image">
                                                        <a href="#"><img src="img/cart/1.jpg" alt=""></a>
                                                    </div>
                                                    <div class="cart-product-info">
                                                        <a href="#" class="product-name"> Donec ac tempus </a>
                                                        <a class="edit-product">Modifier Produit</a>
                                                        <a class="remove-product">Supprimer produit</a>
                                                        <div class="price-times">
                                                            <span class="quantity"><strong> 1 x</strong></span>
                                                            <span class="p-price">$100.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-products">
                                                    <div class="cart-image">
                                                        <a href="#"><img src="img/cart/2.jpg" alt=""></a>
                                                    </div>
                                                    <div class="cart-product-info">
                                                        <a href="#" class="product-name">Quisque in arcu </a>
                                                        <a class="edit-product">Edit item</a>
                                                        <a class="remove-product">Remove item</a>
                                                        <div class="price-times">
                                                            <span class="quantity"><strong> 1 x</strong></span>
                                                            <span class="p-price">$260.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-price-list">
                                                <p class="price-amount">SUBTotal : <span>$356.15</span> </p>
                                                <div class="cart-buttons">
                                                    <a href="checkout.html">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <!--Mainmenu Start-->
            <div class="mainmenu-area hidden-sm hidden-xs">
                <div id="sticker"> 
                    <div class="container">
                        <div class="row">   
                            <div class="col-lg-12 col-md-12 hidden-sm">
                                <div class="mainmenu">
                                    <nav>
                                        <ul id="nav">
                                            <li class="current"><a href="#">Home</a>
<!--                                                <ul class="sub-menu">
                                                    <li><a href="#" class="mega-title">Homepage</a></li>
                                                    <li><a href="index-2.html">Homepage Version 2</a></li>
                                                    <li><a href="index-3.html">Homepage Version 3</a></li>
                                                    <li><a href="index-4.html">Homepage Version 4</a></li>
                                                </ul>-->
                                            </li>
<!--                                            <li><a href="shop-grid.html">Women</a>
                                                <div class="megamenu">
                                                    <div class="megamenu-list clearfix">
                                                        <span>											
                                                            <a href="#" class="mega-title">Clothing</a>
                                                            <a href="#">Blazers</a>
                                                            <a href="#">Jackets</a>
                                                            <a href="#">Collections</a>
                                                            <a href="#">T-Shirts</a>
                                                        </span>
                                                        <span>											
                                                            <a href="#" class="mega-title">Dresses</a>
                                                            <a href="#">Cocktail</a>
                                                            <a href="#">Sunglass</a>
                                                            <a href="#">Evening</a>
                                                            <a href="#">Footwear</a>
                                                        </span>
                                                        <span>											
                                                            <a href="#" class="mega-title">Handbags</a>
                                                            <a href="#">Bootees Bags</a>
                                                            <a href="#">Furniture</a>
                                                            <a href="#">Exclusive</a>
                                                            <a href="#">Jackets</a>
                                                        </span>
                                                        <span class="no-margin">										
                                                            <a href="#" class="mega-title">Jewellery</a>
                                                            <a href="#">Earrings</a>
                                                            <a href="#">Nosepins</a>
                                                            <a href="#">Braclets</a>
                                                            <a href="#">Bangels</a>
                                                        </span>
                                                        <span class="no-margin">										
                                                            <a href="#" class="mega-banner">
                                                                <img src="img/mega-banner.jpg" alt="">
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="shop-grid.html">Men</a>
                                                <div class="megamenu">
                                                    <div class="megamenu-list clearfix">
                                                        <span>											
                                                            <a href="#" class="mega-title">Clothing</a>
                                                            <a href="#">Blazers</a>
                                                            <a href="#">Jackets</a>
                                                            <a href="#">Collections</a>
                                                            <a href="#">T-Shirts</a>
                                                        </span>
                                                        <span>											
                                                            <a href="#" class="mega-title">Dresses</a>
                                                            <a href="#">Cocktail</a>
                                                            <a href="#">Sunglass</a>
                                                            <a href="#">Evening</a>
                                                            <a href="#">Footwear</a>
                                                        </span>
                                                        <span>											
                                                            <a href="#" class="mega-title">Handbags</a>
                                                            <a href="#">Bootees Bags</a>
                                                            <a href="#">Furniture</a>
                                                            <a href="#">Exclusive</a>
                                                            <a href="#">Jackets</a>
                                                        </span>
                                                        <span class="no-margin">										
                                                            <a href="#" class="mega-title">Jewellery</a>
                                                            <a href="#">Earrings</a>
                                                            <a href="#">Nosepins</a>
                                                            <a href="#">Braclets</a>
                                                            <a href="#">Bangels</a>
                                                        </span>
                                                        <span class="no-margin">										
                                                            <a href="#" class="mega-banner">
                                                                <img src="img/mega-banner.jpg" alt="">
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="shop-grid.html">Footwear</a></li>-->
                                            <li><a href="index.html">Pages</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#" class="mega-title">Autres Pages</a></li>
                                                    <li><a href="#">A propos de nous</a></li>
                                           
                                                    <li><a href="account.php">Mon Compte</a></li>
                                         
                                                    
                                                    <li><a href="wishlist.html">Favoris</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Contactez Nous</a></li>
                                        </ul>
                                    </nav>
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            <!--End of Mainmenu-->
            <!-- Mobile Menu Area start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="index.html">HOME</a>
                                            <ul>
                                                <li><a href="index-2.html">Home 2</a></li>
                                                <li><a href="index-3.html">Home 3</a></li>
                                                <li><a href="index-4.html">Home 4</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">SHOP</a>
                                            <ul>
                                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                                <li><a href="shop-list.html">Shop List</a></li>
                                                <li><a href="product-details.html">Product Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                            <ul>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">ABOUT</a>
                                        <li><a href="#">PAGES</a>
                                            <ul>
                                                <li><a href="account.html">My Account</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">CONTACT</a></li>
                                    </ul>
                                </nav>
                            </div>					
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area end -->
        </header>    
        <!--End of Header Area-->