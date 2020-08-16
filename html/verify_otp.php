<?php
    include("connection.php");
    $response = array();
    if (isset($_SESSION['userid']) || !isset($_SESSION['temp_userid'])){
        header("Location:http://localhost/home");
        return;
    }
    //Required Details
    if(!isset($_POST['otp']) ){
        $response["error"] = "Please fill in the details!";
        echo json_encode($response);
        return;
    }  
    
    if($_POST['otp']==$_SESSION['otp']){
        $response["success"] = "Logged In Successfully!";
        $response["userid"] = $_SESSION["temp_userid"];
        $_SESSION["userid"] = $_SESSION["temp_userid"];
        $_SESSION["temp_userid"] = NULL;

        echo json_encode($repsonse);
        return;
    }    
    $response["error"] = "We are having some trouble! Please try again later!";        
    echo json_encode($repsonse);
    return;
?>