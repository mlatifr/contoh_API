<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$con = '';
$con = new mysqli("localhost", "root", "", "kuremas");
if ($con->connect_error) {
    $arr = ["result" => "error", "message" => "unable to connect"];
}
extract($_POST);
$sql = "SELECT resep_masakan_id,id_user_komentar,komentar_id,komentar FROM `resep_has_komentar` inner JOIN resep 
on resep.masakan_id=resep_has_komentar.resep_masakan_id
INNER JOIN komentar
on komentar.id=resep_has_komentar.komentar_id
where resep.masakan_id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $id);
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
// echo($id);
$stmt->close();
$con->close();
