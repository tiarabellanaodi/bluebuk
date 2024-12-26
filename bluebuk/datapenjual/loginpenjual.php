<?php
include('service/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data email dan password dari form
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Query untuk mencari pengguna berdasarkan email
    $sql = "SELECT * FROM penjuallogin WHERE email = ?";
    $stmt = $db->prepare($sql);

    if ($stmt === false) {
        die('Query Preparation Failed: ' . $db->error); // Menampilkan error jika query gagal
    }

    $stmt->bind_param("s", $email); // Bind email ke parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $data['password'])) {
            // Set session dan redirect setelah login berhasil
            session_start();
            $_SESSION['email'] = $email; // Menyimpan email pengguna ke session
            header("Location: dashboar1.php"); // Redirect ke halaman penjual
            exit(); // Pastikan proses berhenti setelah redirect
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Akun tidak ditemukan!";
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
        <form id="login-form" action="loginpenjual.php" method="POST">
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
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