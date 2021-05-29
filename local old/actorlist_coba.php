<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$con = '';
$con = new mysqli("localhost", "root", "", "movies");
if ($con->connect_error) {
    $arr = ["result" => "error", "message" => "unable to connect"];
    echo json_encode($arr);
    die();
}
// $id = $_POST['id'];
$id = 112;
$sql = "SELECT * FROM person where person_id = ? ";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = [];
if ($result->num_rows > 0) {
    $r = mysqli_fetch_assoc($result);


    $sql2 =
        "SELECT person_name,character_name FROM movie_cast inner join 
        person on movie_cast.person_id=person.person_id 
        where person.person_id=$id ";
    $stmt2 = $con->prepare($sql2);
    $stmt2->execute();
    $genres = [];
    $result2 = $stmt2->get_result();
    if ($result2->num_rows > 0) {
        while ($r2 = mysqli_fetch_assoc($result2)) {
            array_push($genres, $r2);
        }
    }
    $r["person"] = $genres;

    $arr = ["result" => "success", "data" => $r];
} else {
    $arr = ["result" => "error", "message" => "sql error: $sql $id"];
}
echo json_encode($arr);
$stmt->close();
$con->close();
