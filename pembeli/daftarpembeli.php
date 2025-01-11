<?php
require '../classes/database.php'; // Pastikan koneksi database benar

// Proses form register
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); // Tanpa hash
    $alamat = trim($_POST['alamat']);
    $nomor_telepon = trim($_POST['nomor_telepon']);

    // Validasi input
    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }
    if (empty($password)) {
        $errors[] = "Password tidak boleh kosong.";
    }
    if (empty($alamat)) {
        $errors[] = "Alamat tidak boleh kosong.";
    }
    if (empty($nomor_telepon) || !preg_match('/^[0-9]+$/', $nomor_telepon)) {
        $errors[] = "Nomor telepon harus berupa angka.";
    }

    // Jika validasi lolos, masukkan ke database
    if (empty($errors)) {
        $query = "INSERT INTO akunpembeli (nama, email, password, alamat, nomor_telepon, created_at)
                  VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sssss', $nama, $email, $password, $alamat, $nomor_telepon);

        if ($stmt->execute()) {
            header("Location: loginpembeli.php"); // Redirect ke halaman login
            exit();
        } else {
            $errors[] = "Gagal mendaftarkan akun. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembeli</title>
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
        <h1>Daftar Akun Pengguna</h1>

        <?php if (!empty($errors)): ?>
            <div class="error-messages">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($_POST['alamat'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" value="<?= htmlspecialchars($_POST['nomor_telepon'] ?? '') ?>" required>
            </div>
            <div class="role-buttons">
                    <input type="submit" id="submit-button" value="Daftar">
                </div>
        </form>
        <div class="signupin-link">
        <p>Sudah punya akun? <a href="loginpembeli.php">Login di sini</a>.</p>
        </div>
    </div>
</body>

</html>
