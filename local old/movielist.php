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
$cari = "%{$_POST['cari']}%";
$sql = "SELECT * FROM movie where title like ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cari);
$stmt->execute();
$result = $stmt->get_result();
$data = [];
if ($result->num_rows > 0) {
    while ($r = mysqli_fetch_assoc($result)) {
        array_push($data, $r);
    }
    $arr = ["result" => "success", "data" => $data];
} else {
    $arr = ["result" => "error", "message" => "sql error: $sql"];
}
echo json_encode($arr);
$stmt->close();
$conn->close();
