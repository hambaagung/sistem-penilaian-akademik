<?php

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $nilai = $_POST['nilai'];
        if (empty($nama) || empty($nim) || empty($jurusan) || empty($nilai)) {
        echo "Error: Semua kolom wajib diisi!<br>";
        echo "<a href='tambah_data.php'>Kembali ke Form</a>";
    } else {
                echo "<h2>Data Berhasil Ditambahkan</h2>";
        echo "<ul>";
        echo "<li>Nama: $nama</li>";
        echo "<li>NIM: $nim</li>";
        echo "<li>Jurusan: $jurusan</li>";
        echo "<li>Nilai: $nilai</li>";
        echo "</ul>";

        echo "<a href='tambah_data.php'>Tambah Data Lagi</a>";
    }

} else {
    echo "Akses tidak valid!";
}
?>