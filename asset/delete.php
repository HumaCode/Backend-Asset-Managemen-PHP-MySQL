<?php

include '../connection.php';

$id         = $_POST['id'];
$image      = $_POST['image'];

$sql = "DELETE FROM asset WHERE id = '$id'";

$result = $connect->query($sql);

if ($result) {

    // hapus gambar
    unlink("../image/" . $image);

    echo json_encode([
        "success" => true
    ]);
} else {
    echo json_encode([
        "success" => false
    ]);
}
