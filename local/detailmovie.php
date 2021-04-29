<?php
error_reporting(E_ALL | E_PARSE);
header("Access-Control-Allow-Origin: *");
$arr = null;
$conn = new mysqli("localhost", "daniel", "ubaya", "movies");
if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "unable to connect"];
	echo json_encode($arr);
	die();
}
$id = $_POST['id'];
$sql = "SELECT * FROM movie where movie_id = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	$r = mysqli_fetch_assoc($result);
	$sql2 =
		"SELECT genre_name FROM genre inner join 
	movie_genres on genre.genre_id=movie_genres.genre_id 
	where movie_id=$id ";
	$stmt2 = $conn->prepare($sql2);
	$stmt2->execute();
	$genres = [];
	$result2 = $stmt2->get_result();
	if ($result2->num_rows > 0) {
		while ($r2 = mysqli_fetch_assoc($result2)) {
			array_push($genres, $r2);
		}
	}
	$r["genres"] = $genres;

	$arr = ["result" => "success", "data" => $r];
} else {
	$arr = ["result" => "error", "message" => "sql error: $sql"];
}
echo json_encode($arr);
$stmt->close();
$conn->close();
