<?php
include "koneksi.php";

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $nilai = $_POST['nilai'];

    if (empty($nama) || empty($nim) || empty($jurusan) || empty($nilai)) {
        echo "Error: Semua kolom wajib diisi!<br>";
        echo "<a href='tambah_data.php'>Kembali ke Form</a>";
        exit;
    }

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, nilai_akhir) 
              VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "sssi", $nama, $nim, $jurusan, $nilai);

    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;

} else {
    echo "Akses tidak valid!";
}
?>