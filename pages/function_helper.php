<?php

class function_helper {
   
    
    public static function getCategory()
    {
        
        $row = array();
         
        
         $con = new mysqli("localhost","root", "", "e_comm_db");
         // Check connection
            if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
            
            $query = "select * from category";
            $result = mysqli_query($con, $query);
            
            
            if( mysqli_num_rows($result)>0) 
                      {
                
                 $row = mysqli_fetch_assoc($result);
              
                    }
                    
                    
            return $row;
    }
    
    
    
    static  function mysql_resultTo2DAssocArray ( $result) {
    $i=0;
    $ret = array();
    while ($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $key => $value) {
            $ret[$i][$key] = $value;
            }
        $i++;
        }
    return ($ret);
    }
    
}
