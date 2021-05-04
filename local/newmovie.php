<?php require 'connect.php';
?>
<?php

extract($_POST);
$sql = "INSERT INTO movie(title,homepage,overview,release_date)
    VALUES(?,?,?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ssss", $title, $homepage, $overview, $release_date);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $arr = ["result" => "success", "id" => $con->insert_id];
} else {
    $arr = ["result" => "fail", "Error" => $con->error];
}
echo json_encode($arr);

$con->close();

?>