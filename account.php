<?php include("header.php"); ?> 

<?php

        //Redirect user to login page if he has not logged in
        if(!isset($_SESSION["ID_USER"]))
        {
            include './pages/ErrorPage.php';
            exit;
        }

        $store_id = 0;


         $con = new mysqli("localhost","root", "", "e_comm_db");
         // Check connection
            if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
               
              $queryStore  = " Select  storeID  , name from store where id_costumer = $_SESSION[ID_USER]";
    
             $result = mysqli_query($con, $queryStore);
             if (!$result) {echo 'MySQL Error: ' . mysqli_error($con); exit;}  
                             
                if( mysqli_num_rows($result)>0) 
                      {
                          if( $row=  mysqli_fetch_assoc($result))   {
                             
                            $store_id =  $row["storeID"];
                            
                          }
                      }
                          
              

?>
        <!-- Account Area start -->
        <div class="account-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="account-link-list">
                            <div class="page-title">
                                <h1>Mon Compte</h1>
                            </div>
                            <p class="account-info">Bienvenue sur votre compte . Ici, vous pouvez gérer tous vos renseignements personnels et les commandes .</p>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#order">                                         
                                                <i class="fa fa-list-ol"></i><span>Historique des commandes et les détails</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="order" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <p class="panel-title">Voici les commandes que vous avez placé depuis votre compte a été créé.</p>
                                            <div id="orders-history">
			                                    <p class="warning">Vous n'avez passé aucune commande.</p>
	                                       </div>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#credit">
                                                <i class="fa fa-file-o"></i><span>Mon Store</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="credit" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                           
                                            <div id="order-history">
                                                
                                                <?php  if( isset($store_id)  AND  $store_id>0 )  {  ?>
                                                <div class="row">
                                                     <div class="col-md-8">   <a href="pages/store.php?myStore=<?=$store_id?>">  Mon Store</a>  </div>
                                                    <div class="col-xs-4"> 
                                                      <a href="pages/store.php?myStore=<?=$store_id?>"> <button type="button" class="btn btn-success">OPEN</button></a> 
                                                       <a href="pages/store.php?store=<?=$store_id?>&type=update"><button type="button" class="btn btn-primary">UPDATE</button></a>
                                                       <a href="pages/store.php?store=<?=$store_id?>&type=delete"> <button type="button" class="btn btn-danger">DELETE</button></a>
                                                    </div>
                                                </div>
			                                    
                                                            
                                      <?php } else { ?>   <p class="warning">Vous n'avez pas de store</p>
                                                      </div>     <p class="panel-title"> <a href="addStore.php">Créer un nouveau Store </a> </p>
                                                     <?php } ?>
	                                       
																				   
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#address">
                                                <i class="fa fa-building"></i><span>Mon Adresse</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="address" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <p>S'il vous plaît configurer votre facturation par défaut et les adresses de livraison lors de la commande . Vous pouvez également ajouter des adresses supplémentaires , qui peuvent être utiles pour l'envoi de cadeaux ou de recevoir une commande à votre bureau .</p>
                                            <p class="panel-title">Vos adresses sont listées ci-dessous. </p>
                                            <p>Assurez-vous de mettre à jour vos informations personnelles si elle a changé .</p>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-8 col-sm-10 address">
                                                    <ul class="address-information">
                                                        <li><h3>Mon Adresse</h3></li>
                                                        <li>
                                                            <span class="address-name">Jhon</span>
                                                            <span class="address-name">Andrew</span>
                                                        </li>
                                                        <li>
                                                            <span class="address-company">Expert</span>
                                                        </li>
                                                        <li>
                                                            <span class="address-address1">Bristol</span>
                                                        </li>
                                                        <li>
                                                            <span class="address-address2">Manchester1</span>
                                                        </li>
                                                        <li>
                                                            <span class="address-city">Bristol</span>
                                                        </li>
                                                        <li>
                                                            <span>United Kingdom</span>
                                                        </li>
                                                        <li>
                                                            <span class="phone">2334234</span>
                                                        </li>
                                                        <li>
                                                            <span class="phone-mobile">454565768678</span>
                                                        </li>
                                                        <li class="address-update">
                                                            <button class="button" type="button"><span>Update</span></button>
                                                            <button class="button delete" type="button"><span>Delete</span></button>
                                                        </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <button class="button floatright" type="button" id="add-new-address"><span>Add a new address</span></button>
                                                    <div class="clearfix"></div>
                                                    <div id="add-new-address-info">
                                                        <p class="panel-title">To add a new address, please fill out the form below. </p>
                                                        <div class="row">
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">First Name</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="input-fname" placeholder="First Name" value="" name="firstname">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">Last Name</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="" name="lastname">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12 col-sm-12 control-label">Company</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="input-company" placeholder="Company" value="" name="company">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">Address 1</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="input-address-one" placeholder="Address 1" value="" name="address_one">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12 col-sm-12 control-label">Address 2</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="input-address-2" placeholder="Address 2" value="" name="address_two">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">City</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="input-city" placeholder="City" value="" name="city">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">Post Code</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="post-code" placeholder="Post Code" value="" name="postcode">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">Phone Number</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="phone-number" placeholder="Phone number" value="" name="phone">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label"> Country </label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <select class="form-control" id="billing-country" name="country_id">
                                                                        <option value=""> --- Please Select --- </option>
                                                                        <option value="1">Aaland Islands</option>
                                                                        <option value="2">Afghanistan</option>
                                                                        <option value="3">Algeria</option>
                                                                        <option value="4">American Samoa</option>
                                                                        <option value="5">Andorra</option>
                                                                        <option value="6">Angola</option>
                                                                        <option value="7">Antigua and Barbuda</option>
                                                                        <option value="8">Ascension Island (British)</option>
                                                                        <option value="9">Australia</option>
                                                                        <option value="10">Bangladesh</option>
                                                                        <option value="11">Barbados</option>
                                                                        <option value="12">Canada</option>
                                                                        <option value="13">Chad</option>
                                                                        <option value="14">Chile</option>
                                                                        <option value="15">China</option>
                                                                        <option value="16">Colombia</option>
                                                                        <option value="17">Denmark</option>
                                                                        <option value="18">Egypt</option>
                                                                        <option value="19">Ethiopia</option>
                                                                        <option value="20">France</option>
                                                                        <option value="21">Germany</option>
                                                                        <option value="22">Hong Kong</option>
                                                                        <option value="23">Lesotho</option>
                                                                        <option value="24">Liberia</option>
                                                                        <option value="25">Luxembourg</option>
                                                                        <option value="26">Malawi</option>
                                                                        <option value="27">Malaysia</option>
                                                                        <option value="28">Maldives</option>
                                                                        <option value="29">Mongolia</option>
                                                                        <option value="30">Montenegro</option>
                                                                        <option value="31">Montserrat</option>
                                                                        <option value="32">Morocco</option>
                                                                        <option value="33">Panama</option>
                                                                        <option value="34">Papua New Guinea</option>
                                                                        <option value="35">Paraguay</option>
                                                                        <option value="36">Peru</option>
                                                                        <option value="37">Philippines</option>
                                                                        <option value="38">Puerto Rico</option>
                                                                        <option value="39">Qatar</option>
                                                                        <option value="40">Zambia</option>
                                                                        <option value="41">Zimbabwe</option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label"> Region / State </label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <select class="form-control" id="billing-city" name="country">
                                                                        <option value=""> --- Please Select --- </option>
                                                                        <option value="1">Aberdeenshire</option>
                                                                        <option value="2">Angus</option>
                                                                        <option value="3">Bedfordshire</option>
                                                                        <option value="4">Berkshire</option>
                                                                        <option value="5">Buckinghamshire</option>
                                                                        <option value="6">Cambridgeshire</option>
                                                                        <option value="7">Denbighshire</option>
                                                                        <option value="8">Devon</option>
                                                                        <option value="9">Durham</option>
                                                                        <option value="10">East Ayrshire</option>
                                                                        <option value="11">East Renfrewshire</option>
                                                                        <option value="12">Edinburgh</option>
                                                                        <option value="13">Greater Manchester</option>
                                                                        <option value="14">Hampshire</option>
                                                                        <option value="15">Inverclyde</option>
                                                                        <option value="16">Isle of Wight</option>
                                                                        <option value="17">Merseyside</option>
                                                                        <option value="18">Midlothian</option>
                                                                        <option value="19">Moray</option>
                                                                        <option value="20">Neath Port Talbot</option>
                                                                        <option value="21">North Lanarkshire</option>
                                                                        <option value="22">Northumberland</option>
                                                                        <option value="23">Orkney Islands</option>
                                                                        <option value="24">Pembrokeshire</option>
                                                                        <option value="25">Powys</option>
                                                                        <option value="26">Rhondda Cynon Taff</option>
                                                                        <option value="27">South Ayrshire</option>
                                                                        <option value="28">Suffolk</option>
                                                                        <option value="29">Tyne and Wear</option>
                                                                        <option value="30">Wiltshire</option>
                                                                        <option value="31">Wrexham</option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">Additional Information</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <textarea rows="10" id="input-enquiry" class="form-control" name="enquiry"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="buttons-set">
                                                                    <button class="button" type="button"><span>Continue </span></button>
                                                                </div>
                                                            </div>
                                                        </div>       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#information">
                                                <i class="fa fa-user"></i><span>Mes informations personnelles</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="information" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="panel-body">
                                            <div class="row">   
                                                <div class="personal-info col-lg-6 col-md-8 col-sm-10">
                                                    <p class="panel-title">S'il vous plaît assurez-vous de mettre à jour vos informations personnelles si elle a changé . </p>
                                                    <div id="account-info">
                                                        <div class="row">
                                                            <div class="form-group required fix no-margin">
                                                                <label class="col-md-3 col-sm-3 col-xs-5 control-label">Social Title</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-7">
                                                                    <div class="radio no-margin">
                                                                        <span class="social_title">
                                                                            <input type="radio" name="gender" value="male">Male 
                                                                        </span>
                                                                        <span class="social_title">
                                                                            <input type="radio" name="gender" value="female">Female
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">First Name</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="input-payment-fname" placeholder="First Name" value="" name="firstname">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">Last Name</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="" name="lastname">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">Email</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="email" placeholder="Email" value="" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 col-xs-12 control-label"> Date of Birth </label>
                                                                <div class="col-md-3 col-sm-3 col-xs-4">
                                                                    <select class="form-control" id="birth-date" name="birth_date">
                                                                        <option value=""> - </option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                        <option value="13">13</option>
                                                                        <option value="14">14</option>
                                                                        <option value="15">15</option>
                                                                        <option value="16">16</option>
                                                                        <option value="17">17</option>
                                                                        <option value="18">18</option>
                                                                        <option value="19">19</option>
                                                                        <option value="20">20</option>
                                                                        <option value="21">21</option>
                                                                        <option value="22">22</option>
                                                                        <option value="23">23</option>
                                                                        <option value="24">24</option>
                                                                        <option value="25">25</option>
                                                                        <option value="26">26</option>
                                                                        <option value="27">27</option>
                                                                        <option value="28">28</option>
                                                                        <option value="29">29</option>
                                                                        <option value="30">30</option>
                                                                        <option value="31">31</option>
                                                                    </select> 
                                                                </div>
                                                                <div class="col-md-3 col-sm-3 col-xs-4">
                                                                    <select class="form-control" id="birth-month" name="birth_month">
                                                                        <option value=""> - </option>
                                                                        <option value="jan">January</option>
                                                                        <option value="feb">February</option>
                                                                        <option value="mar">March</option>
                                                                        <option value="apr">April</option>
                                                                        <option value="may">May</option>
                                                                        <option value="jun">June</option>
                                                                        <option value="jul">July</option>
                                                                        <option value="aug">August</option>
                                                                        <option value="sep">September</option>
                                                                        <option value="oct">October</option>
                                                                        <option value="nov">November</option>
                                                                        <option value="dec">December</option>
                                                                    </select> 
                                                                </div>
                                                                <div class="col-md-3 col-sm-3 col-xs-4">
                                                                    <select class="form-control" id="birth-year" name="birth_year">
                                                                        <option value="">-</option>
                                                                        <option selected="selected" value="2016">2016  </option>
                                                                        <option value="2015">2015  </option>
                                                                        <option value="2014">2014  </option>
                                                                        <option value="2013">2013  </option>
                                                                        <option value="2012">2012  </option>
                                                                        <option value="2011">2011  </option>
                                                                        <option value="2010">2010  </option>
                                                                        <option value="2009">2009  </option>
                                                                        <option value="2008">2008  </option>
                                                                        <option value="2007">2007  </option>
                                                                        <option value="2006">2006  </option>
                                                                        <option value="2005">2005  </option>
                                                                        <option value="2004">2004  </option>
                                                                        <option value="2003">2003  </option>
                                                                        <option value="2002">2002  </option>
                                                                        <option value="2001">2001  </option>
                                                                        <option value="2000">2000  </option>
                                                                        <option value="1999">1999  </option>
                                                                        <option value="1998">1998  </option>
                                                                        <option value="1997">1997  </option>
                                                                        <option value="1996">1996  </option>
                                                                        <option value="1995">1995  </option>
                                                                        <option value="1994">1994  </option>
                                                                        <option value="1993">1993  </option>
                                                                        <option value="1992">1992  </option>
                                                                        <option value="1991">1991  </option>
                                                                        <option value="1990">1990  </option>
                                                                        <option value="1989">1989  </option>
                                                                        <option value="1988">1988  </option>
                                                                        <option value="1987">1987  </option>
                                                                        <option value="1986">1986  </option>
                                                                        <option value="1985">1985  </option>
                                                                        <option value="1984">1984  </option>
                                                                        <option value="1983">1983  </option>
                                                                        <option value="1982">1982  </option>
                                                                        <option value="1981">1981  </option>
                                                                        <option value="1980">1980  </option>
                                                                        <option value="1979">1979  </option>
                                                                        <option value="1978">1978  </option>
                                                                        <option value="1977">1977  </option>
                                                                        <option value="1976">1976  </option>
                                                                        <option value="1975">1975  </option>
                                                                        <option value="1974">1974  </option>
                                                                        <option value="1973">1973  </option>
                                                                        <option value="1972">1972  </option>
                                                                        <option value="1971">1971  </option>
                                                                        <option value="1970">1970  </option>
                                                                        <option value="1969">1969  </option>
                                                                        <option value="1968">1968  </option>
                                                                        <option value="1967">1967  </option>
                                                                        <option value="1966">1966  </option>
                                                                        <option value="1965">1965  </option>
                                                                        <option value="1964">1964  </option>
                                                                        <option value="1963">1963  </option>
                                                                        <option value="1962">1962  </option>
                                                                        <option value="1961">1961  </option>
                                                                        <option value="1960">1960  </option>
                                                                        <option value="1959">1959  </option>
                                                                        <option value="1958">1958  </option>
                                                                        <option value="1957">1957  </option>
                                                                        <option value="1956">1956  </option>
                                                                        <option value="1955">1955  </option>
                                                                        <option value="1954">1954  </option>
                                                                        <option value="1953">1953  </option>
                                                                        <option value="1952">1952  </option>
                                                                        <option value="1951">1951  </option>
                                                                        <option value="1950">1950  </option>
                                                                        <option value="1949">1949  </option>
                                                                        <option value="1948">1948  </option>
                                                                        <option value="1947">1947  </option>
                                                                        <option value="1946">1946  </option>
                                                                        <option value="1945">1945  </option>
                                                                        <option value="1944">1944  </option>
                                                                        <option value="1943">1943  </option>
                                                                        <option value="1942">1942  </option>
                                                                        <option value="1941">1941  </option>
                                                                        <option value="1940">1940  </option>
                                                                        <option value="1939">1939  </option>
                                                                        <option value="1938">1938  </option>
                                                                        <option value="1937">1937  </option>
                                                                        <option value="1936">1936  </option>
                                                                        <option value="1935">1935  </option>
                                                                        <option value="1934">1934  </option>
                                                                        <option value="1933">1933  </option>
                                                                        <option value="1932">1932  </option>
                                                                        <option value="1931">1931  </option>
                                                                        <option value="1930">1930  </option>
                                                                        <option value="1929">1929  </option>
                                                                        <option value="1928">1928  </option>
                                                                        <option value="1927">1927  </option>
                                                                        <option value="1926">1926  </option>
                                                                        <option value="1925">1925  </option>
                                                                        <option value="1924">1924  </option>
                                                                        <option value="1923">1923  </option>
                                                                        <option value="1922">1922  </option>
                                                                        <option value="1921">1921  </option>
                                                                        <option value="1920">1920  </option>
                                                                        <option value="1919">1919  </option>
                                                                        <option value="1918">1918  </option>
                                                                        <option value="1917">1917  </option>
                                                                        <option value="1916">1916  </option>
                                                                        <option value="1915">1915  </option>
                                                                        <option value="1914">1914  </option>
                                                                        <option value="1913">1913  </option>
                                                                        <option value="1912">1912  </option>
                                                                        <option value="1911">1911  </option>
                                                                        <option value="1910">1910  </option>
                                                                        <option value="1909">1909  </option>
                                                                        <option value="1908">1908  </option>
                                                                        <option value="1907">1907  </option>
                                                                        <option value="1906">1906  </option>
                                                                        <option value="1905">1905  </option>
                                                                        <option value="1904">1904  </option>
                                                                        <option value="1903">1903  </option>
                                                                        <option value="1902">1902  </option>
                                                                        <option value="1901">1901  </option>
                                                                        <option value="1900">1900  </option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label"> Current Password </label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="password" name="current-psw" class="form-control psw"> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label"> New Password </label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="password" name="new-psw" class="form-control psw"> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label"> Confirmation </label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="password" name="confirm-psw" class="form-control psw"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="check-box">
                                                                    <div id="newsletters">
                                                                        <span><input type="checkbox" value="1" name="newsletter"></span>
                                                                        <span>Sign up for our newsletter!</span>
                                                                    </div>
                                                                </div>
                                                                <div class="check-box">
                                                                    <div id="offers">
                                                                        <span><input type="checkbox" value="1" name="offer" id="offer"></span>
                                                                        <span>Receive special offers from our partners!  </span>
                                                                    </div> 
                                                                </div>
                                                                <div class="buttons-set">
                                                                    <button class="button" type="button"><span>Save </span></button>
                                                                </div>
                                                            </div>
                                                        </div>       
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wishlist">
                                                <i class="fa fa-heart"></i><span>Mes Favoris</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="wishlist" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="wishlist-container">
                                                        <h3>New Wishlist</h3>
                                                        <div class="row">
                                                            <div class="form-group required">
                                                                <label class="col-md-12 col-sm-12 control-label">Name</label>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <input type="text" class="form-control" id="wishlist-name" placeholder="" value="" name="name">
                                                                </div>
                                                            </div>
                                                        </div>    
                                                        <div class="buttons-set">
                                                            <button class="button" type="button"><span>Save </span></button>
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="button-back">
                            <a href="account.html" class="read-button floatleft"><span>Retour à votre compte</span></a>
                        </div>
                        <div class="button-home">
                            <a href="index.html" class="read-button floatleft"><span>Home</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Account Area-->	
      <?php include("footer.php"); ?> 