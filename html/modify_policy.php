<?php
    include("connection.php");
    $response = array();
    if (!isset($_SESSION['userid']) && !isset($_SESSION['isadmin']) && $_SESSION['isadmin']!='1'){
        header("Location:http://localhost/home");
        return;
    }
    
    //Required Details
    if(!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['description']) 
    || !isset($_POST['maxsalary']) || !isset($_POST['locationavailable'])
    || !isset($_POST['link'])){
        $response["error"] = "Please fill in the details!";
        echo json_encode($response);
        return;
    }  

    //Sanitize string 
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
    $maxsalary = $_POST['maxsalary'];
    $locationavailable = filter_var($_POST['locationavailable'],FILTER_SANITIZE_STRING);  
    $link = filter_var($_POST['link'],FILTER_SANITIZE_STRING);
    $id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);

    $query = "UPDATE policy SET name='$name', description='$description',maxsalary=$maxsalary,locationavailable = '$locationavailable',link= '$link' WHERE id='$id'; ";
    $result = $mysql->query($query);
    if($result){
        $response["success"] = "Policy is modified successfully!";
        echo json_encode($response);
        return;
    }else{        
        $response["error"] = "We are having some trouble! Please try again later!";
        echo json_encode($response);

    }


?>