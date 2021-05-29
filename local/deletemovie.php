<?php require 'connect.php' ?>
<?php

extract($_POST);
$sql = "INSERT INTO movie_genres(movie_id,genre_id)
    VALUES(?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("dd", $movie_id, $genre_id);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $arr = ["result" => "success", "id" => $conn->insert_id];
} else {
    $arr = ["result" => "fail", "Error" => $conn->error];
}
echo json_encode($arr);

$conn->close();

?>