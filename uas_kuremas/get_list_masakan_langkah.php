<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$con = '';
$con = new mysqli("localhost", "root", "", "kuremas");
if ($con->connect_error) {
    $arr = ["result" => "error", "message" => "unable to connect"];
}
extract($_POST);
$sql = "SELECT langkah.langkah_masak as langkah FROM `langkah`
inner JOIN resep_has_langkah
ON resep_has_langkah.langkah_id=langkah.id
INNER JOIN resep
on resep.masakan_id=resep_has_langkah.resep_masakan_id
INNER join masakan
on masakan.id=resep.masakan_id
WHERE masakan.id= ?";
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
