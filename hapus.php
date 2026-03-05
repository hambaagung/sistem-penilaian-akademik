<?php
include "koneksi.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM mahasiswa WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;

} else {

    echo "ID tidak ditemukan!";

}
?>