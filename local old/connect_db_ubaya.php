<?php
error_reporting(E_ALL | E_PARSE);
header("Access-Control-Allow-Origin: *");
$arr = null;
$conn = new mysqli("localhost", "daniel", "ubaya", "movies");
if ($conn->connect_error) {
    $arr = ["result" => "error", "message" => "unable to connect"];
    echo json_encode($arr);
    die();
}
