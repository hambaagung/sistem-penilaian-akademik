<?php
include "koneksi.php";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // enkripsi password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // simpan ke database
    $query = "INSERT INTO users (username,password) VALUES (?,?)";

    $stmt = mysqli_prepare($conn,$query);

    mysqli_stmt_bind_param($stmt,"ss",$username,$passwordHash);

    mysqli_stmt_execute($stmt);

    header("Location: login.php");
}
?>

<h2>Register</h2>

<form method="POST">

Username <br>
<input type="text" name="username" required>
<br><br>

Password <br>
<input type="password" name="password" required>
<br><br>

<button type="submit" name="register">Register</button>

</form>