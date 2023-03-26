<?php

include '../connection.php';

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$sql = "SELECT * FROM user
        WHERE
        username = '$username' AND password = '$password'";


$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $data = array();

    while ($get_row = $result->fetch_assoc()) {
        $data[] = $get_row;
    }

    echo json_encode([
        "success" => true,
        "data" => $data[0],
    ]);
} else {
    echo json_encode([
        "success" => false,
    ]);
}
