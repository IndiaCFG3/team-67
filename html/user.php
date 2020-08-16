<?php
    include("connection.php");
    /*
    $response = array();
    if (!isset($_SESSION['userid'])){
        header("Location:http://localhost/login");
        return;
    }
    */

    //Fetch User Details
    $id = $_SESSION['userid'];

    $res = $mysqli->query("select annualincome,city FROM users WHERE id='$id'");

    if($res) {
        $row = $res->fetch_row();
        $annualincome = $row[0];
        $city = $row[1];

        $policies = $mysqli->query("SELECT * FROM policy");
	

//        $response["data"] = array();
//        while ($fieldinfo = $result->fetch_assoc()) {
//            array_push($response, $fieldinfo["id"]);
//        }
/*
        $response["success"] = "Fetched Policy IDs succesfully!";
        echo json_encode($response);
        return;
*/
}/* else{
        $response["error"] = "We are having some troubles shortening your URL. Please try again later!";
        echo json_encode($response);
        return;
    }
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/user.css" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="user.html">Home</a></li>
      <li><a href="become_member.html"> Become a Member</a>
      <li><a href="edit_profile.html">Edit Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Link</th>
  </tr>
  <?php
  while($row=$policies->fetch_assoc()) {
  ?>
   <tr>
     <th><?php echo $row['name'] ?></th>
     <th><?php echo $row['description'] ?></th>
     <th><?php echo $row['link'] ?></th>
   </tr>
  <?php
  }
  ?>
</table>

</body>
</html>
