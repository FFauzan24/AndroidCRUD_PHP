<?php
include 'koneksi.php';

$id_mhs = $_POST['id_mhs'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

$update = "UPDATE tabel_mahasiswa SET nim = ?, nama = ?, kelas = ?, jurusan = ? WHERE id_mhs = ?";

$stmt = $koneksi->prepare($update);
$stmt->bind_param("sssss", $nim, $nama, $kelas, $jurusan, $id_mhs);

if ($stmt->execute()) {
    echo json_encode(array(
        'status' => 'Data Berhasil Diupdate'
    ));
} else {
    echo json_encode(array(
        'status' => 'Data Gagal Diupdate'
    ));
}

$stmt->close();
$koneksi->close();

?>