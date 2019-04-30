<?php
if(!isset($headers["Authorization"]) || !isset($headers["id"])){
    http_response_code(401);
    die("No token");
}

$headers = getallheaders();
$token = $headers["Authorization"];
$id = $headers["id"];

$sql = "SELECT token,UNIX_TIMESTAMP(token_expire) AS token_expire FROM users WHERE id = $id;";
$res = $conn->query($sql);

if($res->num_rows <= 0){
    die("failed to auth");
}

$row = $res->fetch_assoc();

date_default_timezone_set('UTC');
$now = time();
$expire = $row['token_expire'];

if($now > $expire){
    die( "token expired");
}

if($row['token'] !== $token){
    die( "Not Authorized");
}
?>