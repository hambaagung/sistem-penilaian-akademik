<?php

$mahasiswa = [
    ["nama"=>"Andi","nim"=>"22001","jurusan"=>"Informatika","nilai"=>80],
    ["nama"=>"Budi","nim"=>"22002","jurusan"=>"Sistem Informasi","nilai"=>70],
    ["nama"=>"Citra","nim"=>"22003","jurusan"=>"Informatika","nilai"=>90],
    ["nama"=>"Dina","nim"=>"22004","jurusan"=>"Manajemen","nilai"=>60],
    ["nama"=>"Eko","nim"=>"22005","jurusan"=>"Akuntansi","nilai"=>75]
];

$keyword = "";
$dataDitemukan = false;

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
?>

<!-- FORM PENCARIAN -->
<form method="GET">
    <input type="text" name="keyword" placeholder="Ketik kata kunci..." value="<?= htmlspecialchars($keyword); ?>">
    <button type="submit">Cari</button>
    <a href="index.php">Reset Pencarian</a>
</form>

<hr>

<?php

foreach ($mahasiswa as $data) {

    // Jika tidak ada pencarian → tampilkan semua
    if ($keyword == "") {
        $tampilkan = true;
    } else {
        // dibuat lowercase agar tidak case-sensitive
        $nama = strtolower($data["nama"]);
        $jurusan = strtolower($data["jurusan"]);
        $keywordLower = strtolower($keyword);

        if (str_contains($nama, $keywordLower) || str_contains($jurusan, $keywordLower)) {
            $tampilkan = true;
        } else {
            $tampilkan = false;
        }
    }

    if ($tampilkan) {

        $dataDitemukan = true;

        echo "Nama: " . $data["nama"] . "<br>";
        echo "NIM: " . $data["nim"] . "<br>";
        echo "Jurusan: " . $data["jurusan"] . "<br>";
        echo "Nilai: " . $data["nilai"] . "<br>";

        if ($data["nilai"] >= 75) {
            echo "Status: Lulus<br>";
        } else {
            echo "Status: Remedial<br>";
        }

        if ($data["nilai"] >= 85) {
            $grade = "A";
        } elseif ($data["nilai"] >= 75) {
            $grade = "B";
        } elseif ($data["nilai"] >= 65) {
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