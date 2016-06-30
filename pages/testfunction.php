 




<?php


if(isset($_FILES['fileToUpload']))
{
     $con = new mysqli("localhost","root", "", "e_comm_db");
         // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              
            //initialization params
                $type="type1";
                $ext="jpg";
                $url=null;
             
    
    
    
           
      
            $target_dir = "uploads/";
            $imgName = explode(".", basename($_FILES["fileToUpload"]["name"]));
                $name_image = $imgName[0]."_".rand(10,100000);
                $ext_image = $imgName[1];
            
        $target_file = $target_dir .$name_image.'.'.$ext_image;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "le fichier n est pas une  image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }else
        {
            $ext=$imageFileType;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
               // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                
                
                $url= $target_file;
                //INSERT IMAGE TO DATABASE
                
                if(isset($url))
                {
                    $query="INSERT INTO `image`(`imageID`, `url_image`, `ext`, `type`) "
                        . " VALUES (NULL,'$url','$ext','$type')";
                    $result = mysqli_query($con, $query);
                    if (!$result) {
                     echo 'MySQL Error: ' . mysqli_error($con);
                         exit;
                    }  
                    
                    $image_id = mysqli_insert_id($con);
                    
                    if($image_id>0)
                    {
                         echo  $image_id;
                    } else {
                            echo "Erreur d'ajout";
                        }
                    
                }
                
                
                
                
                
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

}
?>

