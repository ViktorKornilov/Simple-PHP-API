<?php

require "connect_db.php";

$sql = "SELECT * FROM users LIMIT 1;";

$res = $conn->query($sql);

if($res->num_rows > 0){
    //$info = array();
    while($row = $res->fetch_assoc()){
        echo json_encode($row,JSON_NUMERIC_CHECK);
    }

   // echo json_encode($info,JSON_NUMERIC_CHECK);
}else{
    echo "No results";
}

?>