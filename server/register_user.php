<?php
    include("connection.php");
    $response = array();
    if (!isset($_SESSION['userid'])){
        header("Location:http://localhost/home");
        return;
    }
    //Required Details
    if(!isset($_POST['firstname']) || !isset($_POST['lastname']) 
    || !isset($_POST['state']) || !isset($_POST['city'])
    || !isset($_POST['address'])|| !isset($_POST['phoneno']) 
        || !isset($_POST['gender']) || !isset($_POST['annualincome'])
        || !isset($_POST['familymember'])|| !isset($_POST['ismember']) 
      ){
        echo "Please fill in the details!";
        return;
    }  
    $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
    $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'],FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'],FILTER_SANITIZE_STRING);  
    $address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
    $phoneno = filter_var($_POST['phoneno'],FILTER_SANITIZE_STRING);
    $gender = filter_var($_POST['gender'],FILTER_SANITIZE_STRING);
    $annualincome = filter_var($_POST['annualincome'],FILTER_SANITIZE_STRING); 
    $familymember = filter_var($_POST['familymember'],FILTER_SANITIZE_STRING);
    $ismember = filter_var($_POST['ismember'],FILTER_SANITIZE_STRING);
    $volunteerid  = null;
    if(isset($_POST["volunteerid"])){
        $volunteerid = filter_var($_POST['volunteerid'],FILTER_SANITIZE_STRING);
    }

    $randomString = "1092837465qazwsxedcrfvtgbyhnuasdasvasqweccjmikolp4509876wsdfvhn";
    $id = str_shuffle($randomString);
    $id = substr($id,0,30);
    $insert = $mysqli->query("INSERT INTO users(id,firstname,lastname,state,city,address,phoneno,gender,annualincome,familymember,ismember,isadmin,volunteerid) VALUES('$id','$firstname','$lastname','$state','$city','$address','$phoneno','$gender',$annualincome,'$familymember',$ismember,0)");
    if($insert){

        $response["success"] = "Account is Registered successfully!";

        $response["userid"] = $id;        
        $_SESSION["userid"] = $id;
        echo json_encode($response);
        return;
    }else{

        $response["error"] = "We are having some troubles shortening your URL. Please try again later!";

        echo json_encode($response);

    }

?>