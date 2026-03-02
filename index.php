<?php

$mahasiswa = [
    [
        "nama" => "Andi",
        "nim" => "22001",
        "jurusan" => "Informatika",
        "nilai" => 80
    ],
    [
        "nama" => "Budi",
        "nim" => "22002",
        "jurusan" => "Sistem Informasi",
        "nilai" => 70
    ],
    [
        "nama" => "Citra",
        "nim" => "22003",
        "jurusan" => "Informatika",
        "nilai" => 90
    ],
    [
        "nama" => "Dina",
        "nim" => "22004",
        "jurusan" => "Manajemen",
        "nilai" => 60
    ],
    [
        "nama" => "Eko",
        "nim" => "22005",
        "jurusan" => "Akuntansi",
        "nilai" => 75
    ]
];

foreach ($mahasiswa as $data) {

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
?>