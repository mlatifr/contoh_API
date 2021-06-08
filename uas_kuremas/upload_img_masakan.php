<?php require 'connect.php';
?>
<?php
header('Access-Control-Allow-Origin: *');
$nama_masakan = $_POST['nama_masakan'];
$img = base64_decode($_POST['img']);
if (file_put_contents("images/" . $nama_masakan . ".jpg", $img)) {
    // echo "Sukses upload file";
    $imgLocation = "http://mlatifr.ddns.net/emertech/uas_kuremas/images/" . $nama_masakan . ".jpg";
    $sql = "INSERT INTO masakan(nama,url_foto)
    VALUES(?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $nama_masakan, $imgLocation);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $arr = ["result" => "success", 'id_masakan_baru' => $con->insert_id, "imgLocation" => $imgLocation];
    } else {
        $arr = ["result" => "fail", "Error" => $con->error];
    }
    echo json_encode($arr);

    $con->close();

    // if ($result->num_rows > 0) {
    //     while ($r = mysqli_fetch_assoc($result)) {
    //         array_push($data, $r);
    //     }
    //     $arr = ["result" => "success", "data" => $data];
    // } else {
    //     $arr = ["result" => "error", "message" => "sql error: $sql"];
    // }

} else {
    echo "Gagal upload file";
}

?>