<?php require 'connect.php';
?>
<?php

extract($_POST);
$sql = "INSERT INTO 
`komentar` (`komentar`, `id_user_komentar`) 
VALUES (?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $komentar,$id_user_komentar);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $arr = ["result" => "success", "komentar_id" => $con->insert_id];
} else {
    $arr = ["result" => "fail", "Error" => $con->error];
}
echo json_encode($arr);

$con->close();

?>