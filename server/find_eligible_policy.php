<?php
    include("connection.php");
    $response = array();
    if (!isset($_SESSION['userid'])){
        header("Location:http://localhost/login");
        return;
    }

    //Fetch User Details
    $id = $_SESSION['userid'];

    $res = $mysqli->query("select annualincome,city FROM users WHERE id='$id'");

    if($res){
        $row = $res->fetch_row();
        $annualincome = $row[0];
        $city = $row[1];

        $policies = $mysqli->query("SELECT id FROM policy WHERE maxsalary>=$annualincome AND locationavailable='$city'");

        $response["data"] = array();
        while ($fieldinfo = $result->fetch_assoc()) {
            array_push($response, $fieldinfo["id"]);
        }

        $response["success"] = "Fetched Policy IDs succesfully!";
        echo json_encode($response);
        return;
    }else{
        $response["error"] = "We are having some troubles shortening your URL. Please try again later!";
        echo json_encode($response);
        return;
    }

?>
