<?php require 'connect.php' ?>
<?php
extract($_POST);
$sql = "INSERT INTO movie_genres(movie_id,genre_id)
    VALUES(?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("dd", $movie_id, $genre_id);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $arr = ["result" => "success", "id" => $con->insert_id];
} else {
    $arr = ["result" => "fail", "Error" => $con->error];
}
echo json_encode($arr);

$con->close();

?>