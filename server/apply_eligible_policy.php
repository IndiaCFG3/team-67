<?php
    include("connection.php");
    $response = array();
    if (!isset($_SESSION['userid'])){
        header("Location:http://localhost/home");
        return;
    }

    //Fetch User Details
    $id = $_SESSION['userid'];
    
    $res = $mysqli->query("select city,ismember FROM users WHERE id='$id'");

    if($res){
        $row = $res->fetch_row();
        $city = $row[0];
        $ismember = $row[1];
        if($ismember==0){
            $response["error"]="User is not a member!";
            echo json_encode($response);
            return;
        }   
        $agent = $mysqli->query("SELECT firstname,lastname,phoneno FROM users WHERE isadmin = 1 AND city = '$city'");
        if($agent){
            $response["data"] = arry();
            $response["success"] = "Fetched related Agents!";
            while ($row = $result->fetch_assoc()){
                $tp = array();
                array_push($tp,$row["firstname"],$row["lastname"],$row["phoneno"]);
                array_push($respone["data"],$tp);
            }
            echo json_encode($response);
            return;

        }
        $response["error"] = "No agent nearby your location!";
        echo json_encode($response);
        return;
        
    }     
    $response["error"] = "We are having some troubles shortening your URL. Please try again later!";
    echo json_encode($response);
    return;
    

?>