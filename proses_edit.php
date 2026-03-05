<?php
include "koneksi.php";

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $nilai = $_POST['nilai'];

    if (empty($nama) || empty($nim) || empty($jurusan) || empty($nilai)) {
        echo "Error: Semua kolom wajib diisi!<br>";
        echo "<a href='index.php'>Kembali</a>";
        exit;
    }

    $query = "UPDATE mahasiswa 
              SET nama = ?, nim = ?, jurusan = ?, nilai_akhir = ?
              WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "sssii", $nama, $nim, $jurusan, $nilai, $id);

    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;

} else {
    echo "Akses tidak valid!";
}
?>