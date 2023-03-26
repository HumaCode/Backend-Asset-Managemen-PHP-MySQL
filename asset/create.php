<?php

include '../connection.php';

$name       = htmlspecialchars($_POST['name']);
$type       = htmlspecialchars($_POST['type']);
$image      = htmlspecialchars($_POST['image']);
$base64code = $_POST['base64code'];


$sql = "INSERT INTO asset 
        SET 
        name = '$name',
        type = '$type',
        image = '$image'";


$result = $connect->query($sql);

if ($result) {

    // save image
    file_put_contents("../image/" . $image, base64_decode($base64code));

    echo json_encode([
        "success" => true,
        "message" => 'Berhasil',
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => 'Gagal',
    ]);
}
