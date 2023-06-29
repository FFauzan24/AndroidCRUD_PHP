<?php
include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

$query = "INSERT INTO tabel_mahasiswa VALUES (null, ?, ?, ?, ?)";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("ssss", $nim, $nama, $kelas, $jurusan);

if ($stmt->execute()) {
    echo json_encode(array(
        'status' => 'data_tersimpan'
    ));
} else {
    echo json_encode(array(
        'status' => 'gagal',
        'error' => $stmt->error
    ));
}

$stmt->close();
$koneksi->close();

?>