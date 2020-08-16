<?php
    include("connection.php");
    $response = array();
    if (!isset($_SESSION['userid']) && !isset($_SESSION['isadmin']) && $_SESSION['isadmin']!='1'){
        header("Location:http://localhost/home");
        return;
    }
    
    //Required Details
    if(!isset($_POST['id'])){
        $response["error"] = "Please fill in the details!";
        echo json_encode($response);
        return;
    }  

    //Sanitize string 
    $id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);

    $query = "DELETE FROM policy WHERE id = '$id';";
    $result = $mysql->query($query);
    if($result){
        $response["success"] = "Policy is deleted successfully!";
        echo json_encode($response);
        return;
    }else{        
        $response["error"] = "We are having some trouble! Please try again later!";
        echo json_encode($response);
    }


?>