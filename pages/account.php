<?php

session_start();

if(isset($_SESSION["ID_USER"]))
{ session_destroy ();
$_SESSION["ID_USER"]= null;
}
header("Location: http://localhost:82/Ecomm/login.php");
exit();