<?php
include('../classes/database.php');

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Periksa apakah username sudah ada
    $check_query = "SELECT * FROM penjuallogin WHERE username = '$username' OR email = '$email'";
    $check_result = $db->query($check_query);

    if ($check_result->num_rows > 0) {
        echo "Username atau email sudah terdaftar.";
    } else {
        // Simpan data ke database
        $sql = "INSERT INTO penjuallogin (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$password')";

        if ($db->query($sql) === TRUE) {
            echo "Pendaftaran berhasil!";
            header("Location: loginpenjual.php"); // Arahkan ke halaman login setelah berhasil daftar
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjual</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<header>
    <div class="logo">
        <img src="../picture/logo.png" alt="Logo">
    </div>
    <div class="title">BLUEBUK</div>
    <a href="loginpenjual.php" class="kembali-button">Kembali</a>
</header>

<body>
    <div class="form-container">
        <h1>Daftar Penjual</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Ulangi password Anda"
                    required>
            </div>

            <div class="submit-button">
                <button type="submit" name="register">Daftar</button>
            </div>
        </form>

        <div class="signupin-link">
            <p>Sudah punya akun? <a href="loginpenjual.php">Login</a></p>
        </div>
    </div>
</body>

</html>