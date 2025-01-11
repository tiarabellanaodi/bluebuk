<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <link rel="stylesheet" href="../css/stylemenuutama.css">
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="../picture/logo.png" alt="Logo">
            <h2>BLUEBUK</h2>
        </div>
        <div class="user-info">
            <img src="../picture/icon.png" alt="User Foto">
            <span> <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
        </div>
        <div class="navbar">
            <button class="menu-btn">☰</button>
            <div class="dropdown-menu">
                <a href="#pesanan">Riwayat Pesanan</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Informasi Depot -->
    <div class="container">
        <div class="depot-info">
            <h3>Informasi Depot</h3>
            <p><strong>Nama Depot:</strong> Dian Tirta</p>
            <p><strong>Alamat:</strong> Alamat: Ds. Campakasari Kp. Sukamaju Rt. 14/04 Kec. Campaka Kab. Purwakarta</p>
            <p><strong>Jarak:</strong> 500 meter</p>
            <p><strong>Harga per galon:</strong> Rp 5.000</p>
            <p><strong>Jam Operasional:</strong> 08:00 - 20:00</p>
            <button onclick="window.location.href='pesanan.php'">Pesan Sekarang</button>
        </div>
    </div>

    <!-- Pesanan yang Sedang Diproses -->
    <div id = "pesanan" class="container">
        <div class="title">Riwayat Pesanan</div>
        <div class="processing-section">
            <?php
            // Koneksi ke database
            include('../classes/database.php'); // Pastikan file database.php sudah dihubungkan

            // Ambil user_id dari sesi
            $user_id = $_SESSION['user_id'];

            // Query untuk mengambil data pesanan termasuk catatan berdasarkan user_id
            $query = "SELECT id, user_id, nama_depot, jumlah_galon, total_harga, status, waktu_pesan, catatan FROM pesanan WHERE user_id = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Cek apakah ada data pesanan
            if ($result->num_rows > 0):
                while ($pesanan = $result->fetch_assoc()): ?>
                    <div class="depot-card">
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($pesanan['status']); ?></p>
                        <p><strong>Depot:</strong> <?php echo htmlspecialchars($pesanan['nama_depot']); ?></p>
                        <p><strong>Jumlah Galon:</strong> <?php echo htmlspecialchars($pesanan['jumlah_galon']); ?> galon</p>
                        <p><strong>Total Harga:</strong> Rp <?php echo number_format($pesanan['total_harga'], 0, ',', '.'); ?></p>
                        <p><strong>Catatan:</strong> <?php echo htmlspecialchars($pesanan['catatan']); ?></p>
                        <p><strong>Waktu Pesan:</strong> <?php echo htmlspecialchars($pesanan['waktu_pesan']); ?></p>
                    </div>
                <?php endwhile;
            else: ?>
                <p>Tidak ada pesanan dalam proses.</p>
            <?php endif;

            $stmt->close();
            ?>
        </div>
    </div>
</body>

</html>
