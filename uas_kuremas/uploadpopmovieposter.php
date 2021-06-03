<?php
header('Access-Control-Allow-Origin: *');
$movie_id = $_POST['movie_id'];
$img = base64_decode($_POST['image']);
if (file_put_contents("images/" . $movie_id . ".jpg", $img)) {
    echo "Sukses upload file";
} else {
    echo "Gagal upload file";
}
