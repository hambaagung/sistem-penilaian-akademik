<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM mahasiswa WHERE id = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<form method="POST" action="proses_edit.php">

    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>"><br><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']); ?>"><br><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']); ?>"><br><br>

    <label>Nilai:</label><br>
    <input type="number" name="nilai" value="<?= htmlspecialchars($data['nilai_akhir']); ?>"><br><br>

    <button type="submit" name="submit">Update Data</button>

</form>

</body>
</html>