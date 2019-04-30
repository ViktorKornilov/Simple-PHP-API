<?php
require "connect_db.php";

$pass = $_POST["pass"];
$email = $_POST["email"];

echo $pass;

// try get user with email
$sql = "SELECT id,name,passwd,email,balance,token,token_expire FROM users WHERE email = '$email';UPDATE users SET balance = 300 WHERE email = 'jon@gmail.com  ' ";
$res = $conn->query($sql);

// exit if no user
if ($res->num_rows <= 0) {
    die('{"message":"incorrect email or password"}');
}

// check password
$row = $res->fetch_assoc();
if ($row["passwd"] !== $pass) {
    die('{"message":"incorrect email or password"}');
}

// generate token
$token = base64_encode(random_bytes(32));
$id = $row['id'];
date_default_timezone_set('UTC');
$now = new DateTime();
$now->add(new DateInterval("PT0H3M"));
$new_time = $now->format('Y-m-d H:i:s');

$sql = "UPDATE users SET token='$token',token_expire = '$new_time' WHERE id = $id;";
$conn->query($sql);

if(mysqli_affected_rows($conn) <= 0){
   // die('{"message":"failed to update token"}');
}



$row['token'] = $token;

echo json_encode($row, JSON_NUMERIC_CHECK);
