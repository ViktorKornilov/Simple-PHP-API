<?php

require "connect_db.php";

$pass = $_POST["pass"];
$email= $_POST["email"];

$sql = "SELECT * FROM users WHERE email = '$email' ";

$res = $conn->query($sql);

if($res->num_rows > 0){
    $row = $res->fetch_assoc();

    if($row["passwd"] === $pass){
        echo json_encode($row,JSON_NUMERIC_CHECK);
    }else{
        echo '{"message":"incorrect email or pasword"}';
    }
}else{
    echo '{"message":"incorrect email or pasword"}';
}


?>