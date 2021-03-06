<?php
error_reporting(E_ALL | E_PARSE);
header("Access-Control-Allow-Origin: *");
$arr = null;
$conn = new mysqli("localhost", "root", "", "kuremas");
if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "unable to connect"];
	echo json_encode($arr);
	die();
}
extract($_POST);
$sql = "SELECT * FROM user_master where id=? and password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user_name, $user_password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	$r = mysqli_fetch_assoc($result);
	$arr = ["result" => "success", "id" => $r['id']];
} else {
	$arr = ["result" => "error", "message" => "sql error: $sql"];
}
echo json_encode($arr);
// echo('____________');
// echo ($user_name);
// echo ($user_password);
$stmt->close();
$conn->close();
