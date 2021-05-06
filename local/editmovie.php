<?php require 'connect.php';
?>
<?php
// terima data berparameter
$id = '';
$title = '';
$homepage = '';
$overview = '';
$release_date = '';
$id = $_POST['movie_id'];
$title = $_POST['title'];
$homepage = $_POST['homepage'];
$overview = addslashes($_POST['overview']);
$release_date = $_POST['release_date'];
// echo ($id . "<br>" . $title . "<br>" .
//     $homepage . "<br>" .
//     $overview . "<br>" .
//     $release_date . "<br>");
$sql = "UPDATE `movie` SET 
`title` = '$title',
 `homepage` = '$homepage', 
 `overview` = '$overview', 
 `release_date` = '$release_date' 
 WHERE `movie`.`movie_id` = '$id'";

$stmt = $con->query($sql);

$result = $stmt;
$data = [];
// printf(" \n Affected rows (UPDATE): %d\n", $con->affected_rows . '\n');
if ($con->affected_rows > 0) {
    $r = 'success';
    array_push($data, $r);
    $arr = ["result" => "success", "data" => $data];
} else {
    $arr = ["result" => "error", "message" => "sql error: $sql"];
}
// echo ('<br><br><br>');
echo json_encode($arr);
// print('<br>' . $sql);
// $stmt->close();
$con->close();
?>
