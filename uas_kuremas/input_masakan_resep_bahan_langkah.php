<?php require 'connect.php';
?>
<?php

extract($_POST);
$sql = "INSERT INTO resep(masakan_id,user_id,bahan,langkah)
    VALUES(?,?,?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ssss", $masakan_id, $user_id,$bahan,$langkah);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $arr = ["result" => "success", "id" => $con->insert_id];
} else {
    $arr = ["result" => "fail", "Error" => $con->error];
}
echo json_encode($arr);

$con->close();

?>