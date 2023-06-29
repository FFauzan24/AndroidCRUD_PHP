<?php

include 'koneksi.php';

$nim = $_POST['id_mhs'];
$delete = "DELETE FROM tabel_mahasiswa WHERE id_mhs = ?";

$stmt = $koneksi->prepare($delete);
$stmt->bind_param("s", $nim);

if ($stmt->execute()) {
    echo json_encode(array(
        'status' => 'Data Berhasil Dihapus'
    ));
} else {
    echo json_encode(array(
        'status' => 'Data Gagal Dihapus'
    ));
}

$stmt->close();
$koneksi->close();