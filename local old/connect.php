<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$con = new mysqli("13.76.91.251/", "root", "", "movies");
if ($con->connect_error) {
    $arr = ["result" => "error", "message" => "unable to connect"];
    echo json_encode($arr);
    die();
}
