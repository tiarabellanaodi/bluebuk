<?php 
    include("classes/connect.php");
    include("classes/signup.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $signup = new Signup();
    $result = $signup->evaluate($_POST);
    
    if ($result) {
        echo $result; // Tampilkan kesalahan jika ada
    } else {
        echo "Pendaftaran berhasil!";
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
    <title>Bluebuk - Daftar</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <div class="title">BLUEBUK</div>
        <a href="../index.php" class="kembali-button">Kembali</a>
    </header>
    <div class="form-container">
        <h2>Daftar</h2>
        <form method= "post" action="">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="name" name="nama" placeholder="Masukan Nama">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukan Password anda">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Masukan email anda">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukan alamat anda">
            </div>
            <div class="form-group">
                <label>Masuk <br>Sebagai</label>
                <div class="radio-options">
                    <label>
                        <input type="radio" name="role" value="Pembeli"> Pembeli
                    </label>
                    <label>
                        <input type="radio" name="role" value="Penjual"> Penjual
                    </label>
                </div>
            </div>
            <div class="role-buttons">
                <input type="submit" id="submit-button" value="Daftar">
            </div>
            <div class="signupin-link">
                <p>punya akun? <a href="/index.php">Log in</a></p>
            </div>
        </form>
    </div>
</body>
</html>