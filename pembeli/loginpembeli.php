<?php 
session_start();

    include("../classes/database.php");
    include("../classes/login.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = new Login();
    $result = $login->evaluate($_POST);
    
     if ($result != "") {
        // Tampilkan kesalahan jika ada
        echo "<script>alert('$result');</script>";
    } else {
        // Login berhasil, arahkan ke halaman utama
        header("Location: menupembeli.php");
        exit;
    }
   // echo "<pre>";
   // print_r($_POST);
   // echo "</pre>";
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bluebuk - Log in</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <div class="logo">
        <img src="../picture/logo.png" alt="Logo">
        </div>
        <div class="title">BLUEBUK</div>
        <a href="../index.php" class="kembali-button">Kembali</a>
    </header>
    <div class="form-container">
        <form method="post">
            <h1>Log in Pembeli</h1> 
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="text" id="email" placeholder="Masukan Email Anda">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" id="password" placeholder="Masukan Password Anda">
            </div>
            <div class="role-buttons">
                    <input type="submit" id="submit-button" value="Log in">
                </div>
        </form>
        <div class="signupin-link">
            <p>Tidak punya akun? <a href="daftarpembeli.php">Daftar</a></p>
        </div>
    </div>
</body>
</html>