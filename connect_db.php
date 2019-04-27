<?php

$ip = "localhost";
$user = "root";
$pass = "root";
$db = "stock_photos";

$conn = new mysqli($ip,$user,$pass,$db);

if($conn->connect_error){
    die($conn->connect_error);
}

?>