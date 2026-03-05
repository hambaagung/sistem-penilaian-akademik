<?php
include "koneksi.php";

$keyword = "";
$dataDitemukan = false;

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

<h2>Data Mahasiswa</h2>

<!-- FORM PENCARIAN -->
<form method="GET">
    <input type="text" name="keyword"
           placeholder="Ketik nama / jurusan..."
           value="<?= htmlspecialchars($keyword); ?>">
    <button type="submit">Cari</button>
    <a href="index.php">Reset</a>
</form>

<br>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Jurusan</th>
    <th>Nilai</th>
    <th>Status</th>
    <th>Grade</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while ($data = mysqli_fetch_assoc($result)) {

    if ($keyword == "") {
        $tampilkan = true;
    } else {

        $nama = strtolower($data["nama"]);
        $jurusan = strtolower($data["jurusan"]);
        $keywordLower = strtolower($keyword);

        if (str_contains($nama, $keywordLower) ||
            str_contains($jurusan, $keywordLower)) {

            $tampilkan = true;

        } else {

            $tampilkan = false;

        }
    }

    if ($tampilkan) {

        $dataDitemukan = true;

        if ($data["nilai_akhir"] >= 75) {
            $status = "Lulus";
        } else {
            $status = "Remedial";
        }

        if ($data["nilai_akhir"] >= 85) {
            $grade = "A";
        } elseif ($data["nilai_akhir"] >= 75) {
            $grade = "B";
        } elseif ($data["nilai_akhir"] >= 65) {
            $grade = "C";
        } else {
            $grade = "D";
        }
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= htmlspecialchars($data["nama"]); ?></td>
    <td><?= htmlspecialchars($data["nim"]); ?></td>
    <td><?= htmlspecialchars($data["jurusan"]); ?></td>
    <td><?= htmlspecialchars($data["nilai_akhir"]); ?></td>
    <td><?= $status; ?></td>
    <td><?= $grade; ?></td>

    <td>
        <a href="edit.php?id=<?= $data['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $data['id']; ?>"
        onclick="return confirm('antum yakin mau hapus?')">
        Hapus
        </a>
    </td>
</tr>

<?php
    }
}

if ($keyword != "" && !$dataDitemukan) {
    echo "<tr><td colspan='8'>Data tidak ditemukan</td></tr>";
}
?>

</table>

</body>
</html>