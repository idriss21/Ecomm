<?php

// On démarre la session AVANT d'écrire du code HTML

session_start();

         $con = new mysqli("localhost","root", "", "e_comm_db");
         // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              
      
              
              if(isset($_POST['editProduct']))
              {
                  $productID = $_POST['oldProduct'];
                  
                  if(isset($_POST['oldImage']))  $old_image = (int) $_POST['oldImage'];
                  if(isset($_POST['newImage'])) $new_image = (int) $_POST['newImage'];
                  $store = $_POST['store'];
                  $name = $_POST['name'];
                  $price = $_POST['price'];
                  $qte = $_POST['qte'];
                  $description = $_POST['description'];
                  $category = $_POST['category'];
                  
                  
                  if(!empty($new_image)) $image = $new_image;
                  else  $image = $old_image;
                  
                  $query = " UPDATE `product` SET `name`='$name',`description`='$description',`price`=$price,`quantity`=$qte,`id_category`=$category,`id_image`=$image WHERE `productID`=$productID ";
                  
                    $result = mysqli_query($con, $query);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error($con);
                         exit;
                    }  
                    
                     $prduct_id = mysqli_affected_rows($con);
                     
                     
                      if($prduct_id >0)
                    {
                          header("Location: http://localhost:82/Ecomm/myStore.php?store=$store");
                            exit(); 
                    }  else {
                        echo "Erreur d'ajout";
                    }
                  
                  
                  
              }
         
              
              
       if(isset($_POST['addProuct']))
       {
           $name = $_POST['name'];
           $price = $_POST['price'];
           $qte = $_POST['qte'];
           $id_category = $_POST['category'];
           $description = $_POST['description'];
           $category = $_POST['category'];
           $date_created = date('Y-m-d H:i:s');
           $store =  $_POST['store'];
           $image = 1;
           if(isset($_POST['image'])) $image = (int) $_POST['image'];
           
           $query = "INSERT INTO product "
                   . "  (`productID`, `name`, `description`, `date_created`, `price`, "
                   . "          `status`, `quantity`, `id_category`, `id_image`, `id_store`) "
                   . "           VALUES (NULL , '$name','$description','$date_created',$price,"
                   . "                      1,$qte,$category,$image,$store )";
           
          
          
           
            $result = mysqli_query($con, $query);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error($con);
                         exit;
                    }  
                    
            $prduct_id = mysqli_insert_id($con);
            
            
            if($prduct_id >0)
            {
                  header("Location: http://localhost:82/Ecomm/myStore.php?store=$store");
                    exit(); 
            }  else {
                echo "Erreur d'ajout";
            }
           
       }
       
       
       if(isset($_POST['deleteProduct']))
       {
           $store = $_POST['store'];
           
          
           
           foreach($_POST['productID'] as $product){
               
               $query2 = "delete from product where productID = ".$product;
               $query3 ="delete from image where imageID = (select id_image from product where productID = ".$product." ) ";
               $result = mysqli_query($con, $query2);
               $result2 = mysqli_query($con, $query3);
          
           }
           
            header("Location: http://localhost:82/Ecomm/myStore.php?store=".$store);
                    exit();

           
       }
       
       
       if(isset($_GET['store']) AND isset($_GET['type']) AND $_GET['type']='edit'   )
       {
          if(isset($_GET['item']) AND $_GET['item'] > 0 )
          {
              
              $store = $_GET['store'];  $product=$_GET['item'];
              
              $query = " SELECT `productID` , p.`name` as prod , p.`description`, `price`, `quantity`, "
                      . "`id_category`,c.name , i.url_image, `id_image`, `id_store`"
                      . "    FROM `product` p , category c , image i"
                      . "       where i.imageID = p.id_image AND p.id_category = c.categoryID "
                      . "       AND id_store = $store  AND productID = $product ";
               $result = mysqli_query($con, $query);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error($con);
                         exit();
                    } 
             $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             
              header("Location: http://localhost:82/Ecomm/editProduct.php?".http_build_query($row));
                         exit(); 
             
          }
       }