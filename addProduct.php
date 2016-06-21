<?php include("header.php");
     //Redirect user to login page if he has not logged in
        if(!isset($_SESSION['ID_USER']) )
        {
            include './pages/ErrorPage.php';;
           exit();
        }else if(empty($_GET['store']))
        {
            echo " <h2 align='center' style='color : red;'>Store not selected !!</h2>'";
            die();
        }
        
        
            $con = new mysqli("localhost","root", "", "e_comm_db");
         // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              

?>  
<div class="contact-us-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="sidebar-content">
                            
                            
                            
                            
                            <form   id="form" action="pages/testfunction.php" method="post" enctype="multipart/form-data">

                            <div class="banner-box">
                               
                              <a href="#"><img class="myAvatar" id="output" src="img/product/9.jpg" alt=""></a>
                              <div id="err"></div>
                              <input id="uploadImage" type="file" name="fileToUpload" class="newAvatar" style="display:none;" accept="image/*"  onchange="loadFile(event)" />
                              <input  type="hidden"   name="store" value="<?=$_GET['store']?>"/>
                             </div>

                                
                                 <button id="button" type="submit" name="uploadImg"  class="btn btn-primary btn-lg center-block">Charger la photo</button>
                                 
                            <div class="submit-form form-group col-sm-12 ">
                               <!-- <button type="submit" name="uploadImg"  class="btn btn-primary btn-lg center-block">Charger la photo</button> -->
                              
                              
                            </div>
                                 
                               
                               </form>
                            
                            
                            
                            
                            
                            
                   <div class="product-thumb row">
                                        <ul class="p-details-slider" id="gallery_01">
                                            <li class="col-md-4">
                                                <a class="elevatezoom-gallery" href="#" data-image="img/product/20.jpg" data-zoom-image="img/product/20.jpg"><img src="img/product/20.jpg" alt=""></a>
                                            </li>
                                            <li class="col-md-4">
                                                <a class="elevatezoom-gallery" href="#" data-image="img/product/11.jpg" data-zoom-image="img/product/11.jpg"><img src="img/product/11.jpg" alt=""></a>
                                            </li>
                                            <li class="col-md-4">
                                                <a class="elevatezoom-gallery" href="#" data-image="img/product/4.jpg" data-zoom-image="img/product/4.jpg"><img src="img/product/4.jpg" alt=""></a>
                                            </li>
                                            <li class="col-md-4">
                                                <a class="elevatezoom-gallery" href="#" data-image="img/product/7.jpg" data-zoom-image="img/product/7.jpg"><img src="img/product/7.jpg" alt=""></a>
                                            </li>
                                            <li class="col-md-4">
                                                <a class="elevatezoom-gallery" href="#" data-image="img/product/14.jpg" data-zoom-image="img/product/14.jpg"><img src="img/product/14.jpg" alt=""></a>
                                            </li>
                                            <li class="col-md-4">
                                                <a class="elevatezoom-gallery" href="#" data-image="img/product/16.jpg" data-zoom-image="img/product/16.jpg"><img src="img/product/16.jpg" alt=""></a>
                                            </li>
                                            <li class="col-md-4">
                                                <a class="elevatezoom-gallery" href="#" data-image="img/product/18.jpg" data-zoom-image="img/product/18.jpg"><img src="img/product/18.jpg" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>



                       </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="contact-us-area">

                               <?php if(empty($_GET['store'])) { ?>
			          <p class="warning">Create Store before adding product</p>
	                                    
                                    <?php } ?>
                          
                            <!-- contact us form start -->
                            <div class="contact-us-form">
                                <div class="page-title">
                                    <h1>Add Product</h1>
                                        
                                </div>
                                <div class="contact-form">
                                    <span class="legend">Produit Informations : </span>
                                    <form action="pages/product_dba.php" method="post">
                                        <div class="form-top">
                                            <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                                <label>Name  :<span class="required" title="required">*</span></label>
                                                <input name="name" type="text" class="form-control">
                                            </div>
                                            
                                            
                                           <div id="ImageIDUpload"></div>
                                            
                                            
                                            <input type="hidden" name="store" value="<?=$_GET['store']?>"/>
                                            
                                            
                                            
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                  <label>Category  :<span class="required" title="required">*</span></label>
                                                                    <select class="form-control" id="birth-date" name="category">
                                                                            <option value=""> - </option>
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

                                              

                                                                               
                                                   
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label>Description Produit :<span class="required" title="required">*</span></label>
                                                <textarea name="description" class="yourmessage"></textarea>
                                            </div>


                                             <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                            <label>Qte  :<span class="required" title="required">*</span></label>
                                                <input name="qte" type="text" class="form-control">
                                            </div>
                                             <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                            <label>Price  :<span class="required" title="required">*</span></label>
                                                <input name="price" type="text" class="form-control">
                                            </div>




                                        </div>
                                        <div class="submit-form form-group col-sm-12 submit-review">
                                            <p class="floatright"><sup>*</sup> Required Fields</p>
                                            <div class="clearfix"></div>
                                            <button class="button btn-lg floatright" name="addProuct"  type="submit"><span>Ajouter</span></button>


                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- contact us form end -->
                        </div>      
                </div>
            </div>
            </div>

   <script>
    $(".myAvatar").click(function() {
      
        $(".newAvatar").trigger("click");
    });
    
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
    
    
     //UPLOAD IMAGE
    $(document).ready(function (e) {
                $("#form").on('submit',(function(e) {
                 e.preventDefault();
                 $.ajax({
                        url: "pages/testfunction.php",
                  type: "POST",
                  data:  new FormData(this),
                  contentType: false,
                        cache: false,
                  processData:false,
                  beforeSend : function()
                  {
                   //$("#preview").fadeOut();
                   $("#err").fadeOut();
                  },
                  success: function(data)
                     {
                   if(data=='invalid file')
                   {
                    // invalid file format.
                    $("#err").html("Invalid File !").fadeIn();
                   }
                   else if(!isNaN(data))
                   {
                    // view uploaded file.
                    $("#ImageIDUpload").html("<input type='hidden' name='image' value='"+data+"' />").fadeIn();
                     $("#err").html("Image chargé avec succés !").fadeIn();
                    $("#form")[0].reset(); 
                   }else
                   {
                       $("#err").html(data).fadeIn();
                       $("#form")[0].reset(); 
                   }
                     },
                    error: function(e) 
                     {
                   $("#err").html(e).fadeIn();
                     }          
                   });
                }));
               });
</script>

<?php include("footer.php"); ?> 

