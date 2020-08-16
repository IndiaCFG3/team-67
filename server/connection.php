<?php
$mysqli = new mysqli("localhost", "krhero", "admin", "cfg2020", "3306");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  header("Location:http://localhost/home");
?>