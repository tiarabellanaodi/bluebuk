<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpenjual.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual</title>
    <link rel="stylesheet" href="styledashboard.css">
</head>

<body>
    <header>
        <div class="header-container">
            <h1>Dashboard</h1>
            <div class="profile-menu">
                <span class="username"><?= htmlspecialchars($_SESSION['username']); ?> ▼</span>
                <div class="dropdown">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <p>Halo, <?= htmlspecialchars($_SESSION['username']); ?>! Ini adalah halaman dashboard penjual Anda. Gunakan menu ini untuk mengelola produk, pesanan, dan pengaturan lainnya.</p>
    </main>
    <footer>
        &copy; 2024 Bluebuk. Semua Hak Dilindungi.
    </footer>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const profileMenu = document.querySelector('.profile-menu');
    const dropdown = document.querySelector('.profile-menu .dropdown');

    // Toggle dropdown on click
    profileMenu.addEventListener('click', function (e) {
        e.stopPropagation(); // Mencegah klik pada elemen lain menutup langsung
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function () {
        dropdown.style.display = 'none';
    });
});
</script>

</html>
