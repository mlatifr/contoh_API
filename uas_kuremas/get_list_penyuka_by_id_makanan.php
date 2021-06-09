<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$con = '';
$con = new mysqli("localhost", "root", "", "kuremas");
if ($con->connect_error) {
    $arr = ["result" => "error", "message" => "unable to connect"];
}
extract($_POST);
$sql = "SELECT * FROM `resep_has_like`
where resep_masakan_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $resep_masakan_id);
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
$con->close();
