<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$con = new mysqli("localhost", "root", "", "movies");
if ($con->connect_error) {
    $arr = ["result" => "error", "message" => "unable to connect"];
    echo json_encode($arr);
    die();
}
