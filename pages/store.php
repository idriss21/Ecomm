<?php
// On démarre la session AVANT d'écrire du code HTML
include './function_helper.php';
session_start();

         $con = new mysqli("localhost","root", "", "e_comm_db");
         // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              
              
              
              

if(isset($_GET["formAdresse"]))
{
    
    /************** GET Lat , Long By ADRESSE  **************/
    
}


if(isset($_GET["formStore"]))
{
    $url = $_GET['url'];
    $description = $_GET['description'];
    $name = $_GET['name'];
    $status = 1;
    $costumer_id = (int) $_SESSION['ID_USER'];
    $position =  1 ; //position casablanca
    
    if(!empty($name))
    {
        $query = "INSERT INTO `store`(`storeID`, `name`, `Store_url`, `Status`, `id_position`, `id_costumer`)"
                . " VALUES (null,'$name','$url',$status,$position,$costumer_id) ";
        
          $result = mysqli_query($con, $query);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error($con);
                         exit;
                    } 
                    
                    $store_id = mysqli_insert_id($con);
                   
              if(isset($store_id) && $store_id>0)  
               {
                   header("Location: http://localhost:82/Ecomm/account.php");
                    exit();     
               }  else {
                   
                    header("Location: http://localhost:82/Ecomm/addStore.php");
                    exit();
               }
                   
                   
               }
              
        
}


    if(isset($_GET['myStore']))
    {
        $idStore  = $_GET['myStore'];
        $idCostumer = (int) $_SESSION['ID_USER'];
        /*$query ="SELECT p.`name`, `description`, `price`, `quantity` "
                . "FROM `product` p , store s"
                . "              WHERE p.id_store = s.storeID "
                . "                     AND id_store = $idStore AND id_costumer = $idCostumer  ";
        
         $result = mysqli_query($con, $query);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error($con);
                         exit;
                    }   
                    
                    
                    
                    $data = function_helper::mysql_resultTo2DAssocArray($result);*/
             
         
        
          header("Location: http://localhost:82/Ecomm/myStore.php?store=$idStore");
                    exit(); 
        
    }
    
    
    if(isset($_GET['store']) && isset($_GET['type']))
    {
        if($_GET['type']=="delete")
        {
           $query=" delete from store where storeID =".$_GET['store'];
           
            $result = mysqli_query($con, $query);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error($con);
                         exit();
                    } 
                    $count_resutl = mysqli_affected_rows($con);
                  if($count_resutl>0)
                  {
                       header("Location: http://localhost:82/Ecomm/account.php");
                         exit(); 
                  }else
                  {
                      echo "Erreur De suppréssion !!";
                  }
           
        }
    }