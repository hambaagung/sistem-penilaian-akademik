<?php
include "koneksi.php";

$keyword = "";
$dataDitemukan = false;

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

// Ambil semua data dari database
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!-- FORM PENCARIAN -->
<form method="GET">
    <input type="text" name="keyword" 
           placeholder="Ketik kata kunci..." 
           value="<?= htmlspecialchars($keyword); ?>">
    <button type="submit">Cari</button>
    <a href="index.php">Reset Pencarian</a>
</form>

<hr>

<?php

while ($data = mysqli_fetch_assoc($result)) {

    // Jika tidak ada pencarian → tampilkan semua
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

        echo "Nama: " . htmlspecialchars($data["nama"]) . "<br>";
        echo "NIM: " . htmlspecialchars($data["nim"]) . "<br>";
        echo "Jurusan: " . htmlspecialchars($data["jurusan"]) . "<br>";
        echo "Nilai: " . htmlspecialchars($data["nilai_akhir"]) . "<br>";

        if ($data["nilai_akhir"] >= 75) {
            echo "Status: Lulus<br>";
        } else {
            echo "Status: Remedial<br>";
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

        echo "Grade: " . $grade . "<br>";
        echo "<hr>";
    }
}

// Jika keyword ada tapi data tidak cocok
if ($keyword != "" && !$dataDitemukan) {
    echo "Data tidak ditemukan";
}

?>