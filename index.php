<?php

require "AltoRouter.php";

$router = new AltoRouter();

$router->map("POST","/register","register.php");
$router->map("POST","/login","login.php");  

$router->map("GET|POST|DELETE|PUT","/","home.php");

$router->map("POST","/users","post_users.php");
$router->map("GET","/users","get_users.php");
$router->map("GET","/users/[i:id]","get_user.php");
$router->map("DELETE","/users/[i:id]","delete_user.php");
$router->map("PUT","/users/[i:id]","update_user.php");

$router->map("GET","/pictures","get_pictures.php");
$router->map("GET","pictures/[i:id]","get_picture.php");
$router->map("DELETE","/pictures/[i:id]","delete_picture.php");

$router->map("GET","/pictures/[i:id]/like","like_picture.php");
$router->map("POST","/pictures/[i:id]/order","order_picture.php");


$match = $router->match();

if($match){
    require $match["target"];
    http_response_code(200);
}else{

    echo "error";
    http_response_code(404);
}

?>