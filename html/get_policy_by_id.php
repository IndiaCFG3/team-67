<?php
    include("connection.php");
    $response = array();
    if (!isset($_SESSION['userid']) && !isset($_SESSION['isadmin']) && $_SESSION['isadmin']!='1'){
        header("Location:http://localhost/home");
        return;
    }

    if(!isset($_POST["id"])){        
        $response["error"] = "We are having some trouble! Please try again later!";
        echo json_encode($response);
    }

    //Get all policies from MYSQL
    $id = $_POST['id'];
    $query = "SELECT * FROM policy WHERE id = '".$id."';";
    $result = $mysqli->query($query);
    
    if($result){
        $row = $result->fetch_row($result);
        $response["success"] = "Policy data retrieved successfully!";
        $response["data"] = $row;
        echo json_encode($response);
        return;
    }else{
        $response["error"] = "We are having some trouble! Please try again later!";
        echo json_encode($response);
        return;
    }


?>