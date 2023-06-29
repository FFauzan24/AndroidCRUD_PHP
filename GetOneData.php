<?php
include "koneksi.php";

$id = $_POST['id'];

$query = "SELECT * FROM tabel_mahasiswa WHERE id_mhs = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode(array(
        'status' => 'data_not_found'
    ));
}

$stmt->close();
$koneksi->close();

?>