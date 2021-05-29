<?php require 'connect.php';
?>
<?php
// terima data berparameter
$id = '';
$id = $_POST['id'];
$sql = "SELECT title,homepage,overview,release_date FROM `movie` where movie_id = ? ";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
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
?>
