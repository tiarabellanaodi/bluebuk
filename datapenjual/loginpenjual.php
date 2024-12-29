<?php
include('service/database.php');
ob_start(); // Aktifkan output buffering
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM penjuallogin WHERE email = ?";
    $stmt = $db->prepare($sql);

    if ($stmt === false) {
        die('Query Preparation Failed: ' . $db->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $email;
            header("Location: dashboard1.php"); // Redirect
            exit();
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Akun tidak ditemukan!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bluebuk - Login Penjual</title>
    <link rel="stylesheet" href="styleloginpenjual.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="picture/logo.png" alt="Logo">
        </div>
        <div class="title">BLUEBUK</div>
        <a href="pilihan.php" class="kembali-button">Kembali</a>
    </header>

    <div class="form-container">
        <h2>Login Penjual</h2>

        <!-- Form Login -->
        <form id="login-form" action="" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password Anda" required>
            </div>

            <div class="login-buttons">
                <button type="submit">Login</button>
            </div>
        </form>

        <div class="signupin-link">
            <p>Belum punya akun? <a href="daftarpenjual.php">Daftar</a></p>
        </div>
    </div>
</body>

</html>
