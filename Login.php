<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Login berhasil
    $data = $result->fetch_assoc();
    echo json_encode(array(
        'status' => 'success',
        'user_id' => $data['user_id'],
        'username' => $data['username'],
        'name' => $data['name']
    ));
} else {
    // Login gagal
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Username or password is incorrect'
    ));
}

$stmt->close();
$koneksi->close();
?>