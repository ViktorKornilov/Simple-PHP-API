<?php
require "connect_db.php";
//require "auth.php";

$min = "";

if(isset($_GET["min-id"])){
    $min = "LIMIT ".$_GET["min-id"];
}

$sql = "SELECT * FROM users $min ;";

$res = $conn->query($sql);

if($res->num_rows > 0){
    $info = array();
    while($row = $res->fetch_assoc()){
        $info[] = $row;
    }

    echo json_encode($info,JSON_NUMERIC_CHECK);
}else{
    echo "No results";
}

?>