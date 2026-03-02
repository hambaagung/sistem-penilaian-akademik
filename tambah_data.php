<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>

    <h2>Form Input Mahasiswa</h2>

    <form method="POST" action="proses_data.php">

        <label>Nama:</label><br>
        <input type="text" name="nama"><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim"><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan"><br><br>

        <label>Nilai:</label><br>
        <input type="number" name="nilai"><br><br>

        <button type="submit" name="submit">Kirim Data</button>

    </form>

</body>
</html>