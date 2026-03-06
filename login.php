<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // cari user di database
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn,$query);

    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // cek apakah user ada
    if($user){

        // cek password
        if(password_verify($password,$user['password'])){

            // buat session login
            $_SESSION['is_logged_in'] = true;
            $_SESSION['username'] = $user['username'];

            header("Location: index.php");
            exit;

        }else{
            echo "Password salah";
        }

    }else{
        echo "Username tidak ditemukan";
    }

}
?>

<h2>Login</h2>

<form method="POST">

Username <br>
<input type="text" name="username" required>
<br><br>

Password <br>
<input type="password" name="password" required>
<br><br>

<button type="submit" name="login">Login</button>

</form>