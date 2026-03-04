<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>

    <h2>Form Input Mahasiswa</h2>

    <form method="POST" action="proses_data.php">

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" required><br><br>

        <label>Nilai:</label><br>
        <input type="number" name="nilai" required><br><br>

        <button type="submit" name="submit">Kirim Data</button>

    </form>

    <br>
    <a href="index.php">Kembali ke Halaman Utama</a>

</body>
</html>