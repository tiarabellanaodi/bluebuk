<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpenjual.php");
    exit();
}

require '../classes/database.php';

// Ambil data pesanan dengan status "Selesai" atau "Dibatalkan"
$query = "SELECT * FROM pesanan WHERE status IN ('Selesai', 'Dibatalkan') ORDER BY waktu_pesan DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link rel="stylesheet" href="../css/styledashboard.css">
    <link rel="stylesheet" href="../css/stylemenuutama.css">
    <style>
        /* CSS untuk membedakan status */
       
    </style>
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
    <link rel="stylesheet" href="../css/styledashboard.css">
    <link rel="stylesheet" href="../css/stylemenuutama.css">
</head>

<body>
<header>
    <div class="header">
        <div class="logo">
            <img src="../picture/logo.png" alt="Logo">
            <h2>BLUEBUK</h2>
        </div>
        <div class="user-info">
            <img src="../picture/icon.png" alt="User Foto">
            <span> <?= htmlspecialchars($_SESSION['username']); ?></span>
        </div>
        <div class="navbar">
            <button class="menu-btn">☰</button>
            <div class="dropdown-menu">
            <li><a href="menupenjual.php"
                class="<?= basename($_SERVER['PHP_SELF']) === 'menupenjual.php' ? 'active' : ''; ?>">Pesanan</a></li>

                    <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
    <div>
        <div class="container">
            <h1>Riwayat Pesanan</h1>
            <?php if ($result && $result->num_rows > 0): ?>
                <div class="riwayat-list">
                    <?php while ($pesanan = $result->fetch_assoc()): ?>
                        <div class="riwayat-card">
                        <div class="status-container
                                <?php
                                    if ($pesanan['status'] === 'Selesai') {
                                        echo 'status-selesai';
                                    } elseif ($pesanan['status'] === 'Dibatalkan') {
                                        echo 'status-dibatalkan';
                                    }
                                ?>">
                                <?php
                                if ($pesanan['status'] === 'Selesai') {
                                    echo "Pesanan selesai.";
                                } elseif ($pesanan['status'] === 'Dibatalkan') {
                                    echo "Pesanan dibatalkan .";
                                } else {
                                    echo htmlspecialchars($pesanan['status']);
                                }
                                ?>
                            </div>
                            <p><strong>Nama Pemesan:</strong> <?= htmlspecialchars($pesanan['nama_pemesan']); ?></p>
                            <p><strong>Alamat:</strong> <?= htmlspecialchars($pesanan['alamat_pemesan']); ?></p>
                            <p><strong>Jumlah Galon:</strong> <?= htmlspecialchars($pesanan['jumlah_galon']); ?> galon</p>
                            <p><strong>Total Harga:</strong> Rp <?= number_format($pesanan['total_harga'], 0, ',', '.'); ?></p>
                            <p><strong>Waktu Pesan:</strong> <?= htmlspecialchars($pesanan['waktu_pesan']); ?></p>
                            <p><strong>Catatan:</strong> <?= htmlspecialchars($pesanan['catatan']); ?></p>

                            <!-- Keterangan Status -->
                            
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>Tidak ada pesanan yang selesai atau dibatalkan saat ini.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
