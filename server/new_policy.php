<?php
    include("connection.php");
    $response = array();
    if (!isset($_SESSION['userid']) && !isset($_SESSION['isadmin']) && $_SESSION['isadmin']!='1'){
        header("Location:http://localhost/home");
        return;
    }
    
    

?>