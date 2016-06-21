<?php include("header.php");

 //Redirect user to login page if he has not logged in
        if(!isset($_SESSION['ID_USER']))
        {
             include './pages/ErrorPage.php';
            exit;
        }
?>
        <div class="contact-us-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="sidebar-content">


                            <div class="banner-box">
                                <a href="#"><img src="img/banner/2.jpg" alt=""></a>
                       
                            </div>

                            <div class="submit-form form-group col-sm-12 submit-review">
                <button type="button" class="btn btn-primary btn-lg center-block">Charger la photo</button>             </div>


                       </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="contact-us-area">

                            <form action="pages/store.php" method="post">
                                <div class="form-top">
                                            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                                <label>Rechercher par adresse   :<span class="required" title="required">*</span></label>
                                                <input name="name" type="text" class="form-control">
                                            </div>

                        <div class="submit-form form-group col-sm-6 col-md-6 col-lg-6 submit-review">
                            <button class="button floatright" name="formAdresse" type="submit"><span>Rechercher</span></button>
                                        </div>
                            </div>
                        </form>



                              <div class="google-map-area">
                                <!--  Map Section -->
                                <div id="contacts" class="map-area">
                                    <div id="googleMap" style="width:100%;height:430px;"></div>
                                </div>
                            </div>
                          
                            <!-- contact us form start -->
                            <div class="contact-us-form">
                                <div class="page-title">
                                    <h1>Ajouter le Store</h1>
                                </div>
                                <div class="contact-form">
                                    <span class="legend">Contact Information</span>
                                    <form action="pages/store.php" method="get">
                                        <div class="form-top">
                                            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                                <label>Name  :<span class="required" title="required">*</span></label>
                                                <input name="name" type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                                <label>URL<span class="required" title="required">*</span></label> 
                                                <input name="url" type="URL" class="form-control">
                                            </div>   

                                                                               
                                                   
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label>Description Store :<span class="required" title="required">*</span></label>
                                                <textarea name="description" class="yourmessage"></textarea>
                                            </div>


                                        </div>
                                        <div class="submit-form form-group col-sm-12 submit-review">
                                            <p class="floatright"><sup>*</sup> Required Fields</p>
                                            <div class="clearfix"></div>
                                            <button class="button floatright"  name="formStore" type="submit"><span>Submit</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- contact us form end -->
                        </div>      
                </div>
            </div>
            </div>
        </div>
 <?php include("footer.php"); ?>       