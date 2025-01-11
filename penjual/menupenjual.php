<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpenjual.php");
    exit();
}

require '../classes/database.php';

// Handle form pengubahan status
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pesanan_id']) && isset($_POST['status'])) {
        // Update status pesanan
        $pesanan_id = $_POST['pesanan_id'];
        $status = $_POST['status'];

        $query = "UPDATE pesanan SET status = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('si', $status, $pesanan_id);

        if ($stmt->execute()) {
            $success_message = "Status pesanan berhasil diubah.";
        } else {
            $error_message = "Gagal mengubah status pesanan.";
        }
    } elseif (isset($_POST['delete_pesanan_id'])) {
        // Hapus pesanan
        $pesanan_id = intval($_POST['delete_pesanan_id']); // Validasi ID

        $query = "DELETE FROM pesanan WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $pesanan_id);

        if ($stmt->execute()) {
            $success_message = "Pesanan berhasil dihapus.";
        } else {
            $error_message = "Gagal menghapus pesanan.";
        }
    }
}

// Ambil data pesanan dengan status 'Dalam Proses'
$query = "SELECT * FROM pesanan WHERE status = 'Dalam Proses' ORDER BY waktu_pesan DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
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
            <li><a href="riwayatpesanan.php"
                class="<?= basename($_SERVER['PHP_SELF']) === 'riwayatpesanan.php' ? 'active' : ''; ?>">Riwayat Pesanan</a></li>

                    <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
            </header>

            <div class="container">
                <div id="pesanan" class="title">Pesanan Dalam Proses</div>

                <!-- Pesan Sukses atau Error -->

                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($pesanan = $result->fetch_assoc()): ?>
                        <div class="depot-card">
                            <div class="depot-info">
                                <h4><?= htmlspecialchars($pesanan['nama_depot']); ?></h4>
                                <p><strong>Nama Pemesan:</strong> <?= htmlspecialchars($pesanan['nama_pemesan']); ?></p>
                                <p><strong>Alamat Pemesan:</strong> <?= htmlspecialchars($pesanan['alamat_pemesan']); ?></p>
                                <p><strong>Jumlah Galon:</strong> <?= htmlspecialchars($pesanan['jumlah_galon']); ?> galon</p>
                                <p><strong>Total Harga:</strong> Rp <?= number_format($pesanan['total_harga'], 0, ',', '.'); ?></p>
                                <p><strong>Status:</strong> <?= htmlspecialchars($pesanan['status']); ?></p>
                                <p><strong>Waktu Pesan:</strong> <?= htmlspecialchars($pesanan['waktu_pesan']); ?></p>
                                <p><strong>Catatan:</strong> <?= htmlspecialchars($pesanan['catatan']); ?></p>
                            </div>
                            <!-- Form untuk Mengubah Status -->
                            <form method="post" action="">
                                <input type="hidden" name="pesanan_id" value="<?= $pesanan['id']; ?>">
                                <select name="status">
                                    <option value="Dalam Proses" <?= $pesanan['status'] === 'Dalam Proses' ? 'selected' : ''; ?>>Dalam Proses</option>
                                    <option value="Selesai" <?= $pesanan['status'] === 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                                    <option value="Dibatalkan" <?= $pesanan['status'] === 'Dibatalkan' ? 'selected' : ''; ?>>Dibatalkan</option>
                                </select>
                                <button type="submit">Ubah Status</button>
                            </form>

                            <!-- Form untuk Menghapus Pesanan -->
                            <form method="post" action="" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                <input type="hidden" name="delete_pesanan_id" value="<?= $pesanan['id']; ?>">
                                <button type="submit" class="delete-btn">Hapus Pesanan</button>
                            </form>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Tidak ada pesanan dengan status 'Dalam Proses'.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <footer>
        &copy; 2024 Bluebuk. Semua Hak Dilindungi.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const profileMenu = document.querySelector('.profile-menu');
            const dropdown = document.querySelector('.profile-menu .dropdown');

            profileMenu.addEventListener('click', function () {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            });

            document.addEventListener('click', function (event) {
                if (!profileMenu.contains(event.target)) {
                    dropdown.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
