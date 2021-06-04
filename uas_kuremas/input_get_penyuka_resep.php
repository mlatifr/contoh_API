<?php require 'connect.php';
?>
<?php

extract($_POST);
$sql = "INSERT INTO `resep_has_like` 
(`resep_masakan_id`, `resep_user_id`, `like_id`) 
VALUES (?,?,?);";
$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $id_masakan,$id_user_pembuat,$id_penyuka);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $arr = ["result" => "success", "id" => $con->insert_id];
} else {
    $arr = ["result" => "fail", "Error" => $con->error];
}
echo json_encode($arr);

$con->close();

?>