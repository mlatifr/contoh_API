<?php
error_reporting(E_ALL | E_PARSE);
header("Access-Control-Allow-Origin: *");
$arr = null;
$conn = new mysqli("localhost", "root", "", "movies");
if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "unable to connect"];
	echo json_encode($arr);
	die();
}
extract($_POST);
$sql = "SELECT * FROM master_user where user_name=? and user_password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user_name, $user_password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	$r = mysqli_fetch_assoc($result);
	$arr = ["result" => "success", "user_name" => $r['user_name']];
} else {
	$arr = ["result" => "error", "message" => "sql error: $sql"];
}
echo json_encode($arr);
// echo('____________');
// echo ($user_name);
// echo ($user_password);
$stmt->close();
$conn->close();
