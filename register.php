<?php

require "connect_db.php";

$name = $_POST["name"];
$pass = $_POST["pass"];
$email= $_POST["email"];

$sql = "INSERT INTO users(name,passwd,email) VALUES ('$name','$pass','$email');";

$conn->query($sql);

$sql = "SELECT * FROM users WHERE email = '$email' ";

$res = $conn->query($sql);


if($res->num_rows > 0){
    $row = $res->fetch_assoc();

    echo json_encode($row,JSON_NUMERIC_CHECK);
}else{
    echo '{"message":"failed to create the user"}';
}

echo $sql;

?>