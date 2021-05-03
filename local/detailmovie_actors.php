<?php
require 'connect.php'; ?>
<?php
// error_reporting(E_ALL | E_PARSE);
// header("Access-Control-Allow-Origin: *");
// $arr = null;
// // koneksi
// $conn = new mysqli("localhost", "root", "", "movies");
// if ($conn->connect_error) {
// 	$arr = ["result" => "error", "message" => "unable to connect"];
// 	echo json_encode($arr);
// 	die();
// }

// terima data berparameter
$id = $_POST['id'];
$sql = "SELECT * FROM movie where movie_id = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// terima balasan dari DB
if ($result->num_rows > 0) {
	// fetches a result row as an associative array
	$r = mysqli_fetch_assoc($result);


	// begin mengambil genre pada movie tsb
	$sql2 =
		"SELECT genre_name FROM genre inner join 
	movie_genres on genre.genre_id=movie_genres.genre_id 
	where movie_id=$id ";
	$stmt2 = $conn->prepare($sql2);
	$stmt2->execute();
	$genres = [];
	$result2 = $stmt2->get_result();
	if ($result2->num_rows > 0) {
		// bisa juga pakai fetch_arr
		while ($r2 = mysqli_fetch_assoc($result2)) {
			// mengisi array[] $genres dengna $r2
			array_push($genres, $r2);
		}
	}
	// membuat field baru yang isinya array[$genres]
	$r["genres"] = $genres;
	// end mengambil genre pada movie tsb

	// begin mengambil actor pada movie tsb
	$sql3 =
		"SELECT movie.title,person_name,character_name 
	FROM movie_cast INNER join person 
	on movie_cast.person_id=person.person_id 
	INNER JOIN movie 
	on movie.movie_id=movie_cast.movie_id
	where movie.movie_id=$id ";

	$stmt3 = $conn->prepare($sql3);
	$stmt3->execute();
	$actors = [];
	$result3 = $stmt3->get_result();
	if ($result3->num_rows > 0) {
		// bisa juga pakai fetch_arr
		while ($r3 = mysqli_fetch_assoc($result3)) {
			// mengisi array[] $genres dengna $r2
			array_push($actors, $r3);
		}
	}
	// membuat field baru yang isinya array[$genres]
	$r["actors"] = $actors;
	// end mengambil genre pada movie tsb

	$arr = ["result" => "success", "data" => $r];
} else {
	$arr = ["result" => "error", "message" => "sql error: $sql"];
}
echo json_encode($arr);
$stmt->close();
$conn->close();
