<?php include("header.php"); ?>
<div class="checkout-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page-title">
                            <h1>Inscription</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a aria-expanded="true" class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#billing">
                                            <span>2</span> BILLING INFORMATION
                                        </a>
                                    </h4>
                                </div>
                                <div style="" aria-expanded="true" id="billing" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="login-form">
                                            <form action="pages/inscrip_dba.php" method="post">
                                                <div class="customer-name">
                                                    <div class="first-name">
                                                        <p>First Name<span>*</span></p>
                                                        <input  name="fname" type="text">
                                                    </div>
                                                    <div class="last-name">
                                                        <p>Last Name<span>*</span></p>
                                                        <input  name="lname" type="text">
                                                    </div>
                                                </div>
                                                <div class="customer-info">
                                                    <div class="company-name">
                                                        <p>Company</p>
                                                        <input type="text">
                                                    </div>
                                                    <div class="email-address">
                                                        <p>Email Adress<span>*</span></p>
                                                        <input  name="email" type="email">
                                                    </div>
                                                </div>
                                                
                                                <div class="customer-info">
                                                    <div class="company-login">
                                                        <p>Login <span>*</span></p>
                                                        <input type="text" name="login"  >
                                                    </div>
                                                    <div class="customer-password">
                                                        <p>password<span>*</span></p>
                                                        <input  name="pass" type="password">
                                                    </div>
                                                </div>
                                                
                                                
                                                <p>Address<span>*</span></p>
                                                <input  name="adresse" type="text">
                                                <input type="text">
                                                <div class="city-country">
                                                    <div class="city">
                                                        <p>City<span>*</span></p>
                                                        <input  type="text">
                                                    </div>
                                                    <div class="state">
                                                        <p>State/Province</p>
                                                        <select class="country">
                                                            <option value="state">Please select region, state or province</option>
                                                            <option value="indo">Bahasa Indonesia</option>
                                                            <option value="melyu">Bahasa Melayu</option>		
                                                            <option value="deutsch">Deutsch (Deutschland)</option>		
                                                            <option value="austra">English (Australia)</option>		
                                                            <option value="canada">English (Canada)</option>		
                                                            <option value="india">English (India)</option>		
                                                            <option value="ireland">English (Ireland)</option>		
                                                            <option value="maktoob">English (Maktoob)</option>		
                                                            <option value="malaysia">English (Malaysia)</option>		
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="city-country">
                                                    <div class="city">
                                                        <p>Zip/Postal Code<span>*</span></p>
                                                        <input  type="text">
                                                    </div>
                                                    <div class="state">
                                                        <p>Country<span>*</span></p>
                                                        <select class="country">
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="AU">Australia</option>		
                                                            <option value="BH">Bahrain</option>		
                                                            <option value="BD">Bangladesh</option>		
                                                            <option value="CA">Canada</option>		
                                                            <option value="DK">Denmark</option>		
                                                            <option value="EG">Egypt</option>		
                                                            <option value="FR">France</option>		
                                                            <option value="GB">United Kingdom</option>		
                                                            <option selected="selected" value="US">United States</option>		
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="customer-info">
                                                    <div class="telephone">
                                                        <p>Telephone<span>*</span></p>
                                                        <input  type="text">
                                                    </div>
                                                    <div class="fax">
                                                        <p>Fax</p>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <div class="ship-wrap">
                                                    <div class="ship-address">
                                                        <label>
                                                            <input name="shipping_address" value="old-address" checked="checked" type="radio">Ship to this address
                                                        </label>    
                                                    </div>
                                                     <div class="ship-address">
                                                       <label>
                                                            <input name="shipping_address" value="new-address" id="ship-new-address" type="radio">Ship to different address
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="ship-new-address-info">
                                                    <div class="customer-name">
                                                        <div class="first-name">
                                                            <p>First Name<span>*</span></p>
                                                            <input  type="text">
                                                        </div>
                                                        <div class="last-name">
                                                            <p>Last Name<span>*</span></p>
                                                            <input  type="text">
                                                        </div>
                                                    </div>
                                                    <div class="customer-info">
                                                        <div class="company-name">
                                                            <p>Company</p>
                                                            <input type="text">
                                                        </div>
                                                        <div class="email-address">
                                                            <p>Email Adress<span>*</span></p>
                                                            <input  type="email">
                                                        </div>
                                                    </div>
                                                    <p>Address<span>*</span></p>
                                                    <input  type="text">
                                                    <input type="text">
                                                    <div class="city-country">
                                                        <div class="city">
                                                            <p>City</p>
                                                            <input  type="text">
                                                        </div>
                                                        <div class="state">
                                                            <p>State/Province</p>
                                                            <select class="country">
                                                                <option value="state">Please select region, state or province</option>
                                                                <option value="indo">Bahasa Indonesia</option>
                                                                <option value="melyu">Bahasa Melayu</option>		
                                                                <option value="deutsch">Deutsch (Deutschland)</option>		
                                                                <option value="austra">English (Australia)</option>		
                                                                <option value="canada">English (Canada)</option>		
                                                                <option value="india">English (India)</option>		
                                                                <option value="ireland">English (Ireland)</option>		
                                                                <option value="maktoob">English (Maktoob)</option>		
                                                                <option value="malaysia">English (Malaysia)</option>		
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="city-country">
                                                        <div class="city">
                                                            <p>Zip/Postal Code</p>
                                                            <input  type="text">
                                                        </div>
                                                        <div class="state">
                                                            <p>Country</p>
                                                            <select class="country">
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AU">Australia</option>		
                                                                <option value="BH">Bahrain</option>		
                                                                <option value="BD">Bangladesh</option>		
                                                                <option value="CA">Canada</option>		
                                                                <option value="DK">Denmark</option>		
                                                                <option value="EG">Egypt</option>		
                                                                <option value="FR">France</option>		
                                                                <option value="GB">United Kingdom</option>		
                                                                <option selected="selected" value="US">United States</option>		
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="customer-info">
                                                        <div class="telephone">
                                                            <p>Telephone<span>*</span></p>
                                                            <input  type="text">
                                                        </div>
                                                        <div class="fax">
                                                            <p>Fax</p>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="buttons-set">
                                                    <button class="button" name="signUp" type="submit"><span>Continue</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
                    </div>
                </div>
                
            </div>
</div>
        <?php include("footer.php"); ?>          