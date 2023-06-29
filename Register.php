<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];

$query = "INSERT INTO users (username, password, name) VALUES (?, ?, ?)";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("sss", $username, $password, $name);

if ($stmt->execute()) {
    echo json_encode(array(
        'status' => 'success',
        'message' => 'User registered successfully'
    ));
} else {
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Failed to register user'
    ));
}

$stmt->close();
$koneksi->close();
?>