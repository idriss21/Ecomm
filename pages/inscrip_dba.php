<?php

// On démarre la session AVANT d'écrire du code HTML

session_start();

         $con = new mysqli("localhost","root", "", "e_comm_db");
         // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              
              
         
                    
     if(isset($_POST['signUp'])){   
             if(!empty($_POST['fname']) AND !empty($_POST['lname']) AND !empty($_POST['email']) )
        {
           if(!empty($_POST['login']) AND !empty($_POST['pass']))
           {
                $log =  $_POST['login'] ; $pass =$_POST['pass']; $fname=$_POST['fname'];  $lname = $_POST['lname']; $email =$_POST['email'];
                    $query2=" INSERT INTO `user`( `first_name`, `last_name`, `email`, `address`, `login`, `password`)"
                            . " VALUES ('$fname','$lname','$email','inconnu','$log','$pass')";
                    $result = mysqli_query($con, $query2);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error();
                         exit;
                    }   
                    
                    $user_id = mysqli_insert_id($con);
                  
               if(isset($user_id) && $user_id>0)  
               {
                   
                     $date_now = date('Y-m-d H:i:s'); $type_auth = 1; $status = 1; $city = 1;
                        
                    $query3 = " INSERT INTO `costumer`( `costumerID` , `date_created`, `type_auth`, `status`, `id_user`, `id_city`)"
                       . " VALUES (NULL,'$date_now',$type_auth,$status,$user_id,$city)";
                    
               
                        $result2 = mysqli_query($con, $query3);  
                       $costumer_id = mysqli_insert_id($con);
                       
                       
                     
                    $getInfo = " select first_name , last_name , email from user  u , costumer c"
                            . "     where u.userID = c.id_user and costumerID = ".$costumer_id;
                    
                    $resultInfo = mysqli_query($con,$getInfo);
                            
                            if( mysqli_num_rows($resultInfo)>0) 
                      {
                          if( $row=  mysqli_fetch_assoc($resultInfo))   {
                              
                               $_SESSION["ID_USER"]=$costumer_id;
                                $_SESSION["userInfo"]=$row["first_name"]+" "+$row["last_name"];
                                $_SESSION["email"]=$row["email"];
                                  header('Location: http://localhost:82/Ecomm/index.php');
                              exit();
                          }
                      }
               
                  
                   
               }
           }else
           {
               $error['auth_user']="login or password not checked";
           }
        }else
        {
            $error['personal_info']="first , last name or email not checked";
        }
        
        if(!empty($query)) print_r ($error);
        }
        
        
       if(isset($_POST['logIn']))
        {
             if(isset($_POST['login']) AND isset($_POST['pass']))
           {
                    //$query2=" SELECT * FROM user WHERE login = '".$_POST['login']."' and password = '".$_POST['pass']+"'";
                                    
                    $log =  $_POST['login'] ; $pass =$_POST['pass'];
                    $query2=" SELECT costumerID , first_name,last_name , email FROM user u , costumer c    WHERE u.userID = c.id_user"
                            . "  AND login = '$log' AND password = '$pass'";
                    $result = mysqli_query($con, $query2);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error($con);
                         exit;
                    }   
                     // Associative array
                  
                      if( mysqli_num_rows($result)>0) 
                      {
                          if( $row=  mysqli_fetch_assoc($result))   {
                              
                              $_SESSION["ID_USER"]= $row["costumerID"];
                              $_SESSION["userInfo"]=$row["first_name"]+" "+$row["last_name"];
                              $_SESSION["email"]=$row["email"];
                              header('Location: http://localhost:82/Ecomm/index.php');
                              exit();
                              
                          }else
                          {
                              include '../login.php';
                          }
                      }
                          
           }else{
                echo " login et password invalid !!";
           }
        }
       
        
        
        