<?php
    include("connection.php");
    $response = array();
    if (isset($_SESSION['userid'])){
        header("Location:http://localhost/home");
        return;
    }
    //Required Details
    if(!isset($_POST['phoneno'])){
        $response["error"] = "Please fill in the details!";
        echo json_encode($response);
        return;
    }  

    //Sanitize string 
    $phoneno = filter_var($_POST['phoneno'],FILTER_SANITIZE_STRING);

    //Check whether user exists
    $res = $mysql->query("SELECT id FROM users WHERE phoneno='$phoneno';");
    if($res){
        $row = $res->fetch_row();  
        $id = $row[0];
        $apiKey = urlencode('YOUR_API_KEY');
        $Textlocal = new Textlocal(false, false, $apiKey);
        
        $numbers = array(
            $phoneno
        );
        $sender = 'PHPPOT';
        $otp = rand(100000, 999999);
        
        try{
            $result = $Textlocal->sendSms($numbers, $message, $sender);   
            $_SESSION["temp_userid"] =  $id;
            $_SESSION["otp"] = $otp;        
            $response["success"] = "OTP has been sent!";
            echo json_encode($response);
            return;
        }catch(Exception $e){
            //Comment below code after getting API
            $result = $Textlocal->sendSms($numbers, $message, $sender);   
            $_SESSION["temp_userid"] =  $id;
            $_SESSION["otp"] = $otp;        
            $response["success"] = "OTP has been sent!";
            //$response["error"] = "We are having some troubles shortening your URL. Please try again later!";
            echo json_encode($response);
        }
    }else{
        
        $response["error"] = "We are having some trouble! Please try again later!";
        echo json_encode($response);

    }

?>