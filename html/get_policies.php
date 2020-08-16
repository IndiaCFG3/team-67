<?php
    include("connection.php");
    $response = array();
    if (!isset($_SESSION['userid']) && !isset($_SESSION['isadmin']) && $_SESSION['isadmin']!='1'){
        header("Location:http://localhost/home");
        return;
    }

    //Get all policiy IDs from MYSQL
    $result = $mysql->query("SELECT id FROM policy");
    
    if($resutl){
        $storeArray = Array();
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $storeArray[] =  $row['id'];  
        }
        $response["success"] = "Policy IDs retrieved successfully!";
        $response["data"] = $storeArray;
        echo json_encode($response);
        return;
    }else{
        $response["error"] = "We are having some trouble! Please try again later!";
        echo json_encode($response);
        return;
    }


?>