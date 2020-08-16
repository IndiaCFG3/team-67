<?php
    include("connection.php");
    $response = array();
 /*   if (!isset($_SESSION['userid']) && !isset($_SESSION['isadmin']) && $_SESSION['isadmin']!='1'){
        header("Location:http://localhost/home");
        return;
    }
*/
    //Required Details
    if(!isset($_POST['name']) || !isset($_POST['description'])
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

    //Set Policy ID
    $randomString = "1092837465qazwsxedcrfvtgbyhnuasdasvasqweccjmikolp4509876wsdfvhn";
    $id = str_shuffle($randomString);
    $id = substr($id,0,30);

    //Insert into MYSQL
    $insert = $mysqli->query("INSERT INTO policy VALUES('$name','$description',$maxsalary,'$locationavailable','$link','$id')");
    if($insert){
        $response["success"] = "Policy is added successfully!";
        //echo json_encode($response);
        header("location:admin.php");
        return;
    }else{
        $response["error"] = "We are having some trouble! Please try again later!";
        echo json_encode($response);

    }
?>
