<?php require 'connect.php';
?>
<?php
// terima data berparameter
$id = '';
$title= '';
$homepage= '';
$overview= '';
$release_date= '';
$id = $_POST['id'];
$title= $_POST['title'];
$homepage= $_POST['homepage'];
$overview= $_POST['overview'];
$release_date= $_POST['release_date'];

$sql ="UPDATE `movie` SET `title` = ?, `homepage` = ?, `overview` = ?, `release_date` = ? WHERE `movie`.`movie_id` = ?";

/*$sql = "SELECT title,homepage,overview,release_date FROM `movie` where movie_id = ? ";*/
$stmt = $con->prepare($sql);
$stmt->bind_param("issss", $id,$title,$homepage,$overview,$release_date);
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
