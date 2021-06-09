<?php require 'connect.php';
?>
<?php

extract($_POST);
$sql = "INSERT INTO `like` (`id_user`) VALUES (?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $id_user);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $arr = ["result" => "success", "like_id" => $con->insert_id, "like_id_user" => $id_user];
} else {
    $arr = ["result" => "fail", "Error" => $con->error];
}
echo json_encode($arr);

$con->close();

?>