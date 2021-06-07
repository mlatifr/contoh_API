<?php
header('Access-Control-Allow-Origin: *'); 
$nama_masakan = $_POST['nama_masakan'];
$img = base64_decode($_POST['img']);
if(file_put_contents("images/".$nama_masakan.".jpg", $img))
{
    echo "Sukses upload file";
}
else
{
    echo "Gagal upload file";
}
	
?>