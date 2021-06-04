<?php require 'connect.php';
?>
<?php

extract($_POST);
$sql = "INSERT INTO masakan(nama,url_foto)
    VALUES(?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $nama_masakan, $url_foto);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $arr = ["result" => "success", "id" => $con->insert_id];
} else {
    $arr = ["result" => "fail", "Error" => $con->error];
}
echo json_encode($arr);

$con->close();

?>