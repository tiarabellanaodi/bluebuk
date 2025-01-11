<?php
session_start();
include("../classes/database.php");

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: loginpembeli.php");
    exit;
}

// Ambil user_id dari sesi
$user_id = $_SESSION['user_id'];

// Ambil nama dan alamat pengguna dari tabel akunpembeli
$query = "SELECT nama, alamat FROM akunpembeli WHERE id = ?";
$stmt = $db->prepare($query);
if (!$stmt) {
    die("Query gagal disiapkan: " . $db->error);
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    $nama_pemesan = $user_data['nama'];
    $alamat_pemesan = $user_data['alamat'];
} else {
    // Jika data tidak ditemukan
    die("Data pengguna tidak ditemukan.");
}

// Jika form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_depot = "Dian Tirta";
    $jumlah_galon = (int)$_POST['jumlah_galon'];
    $catatan_pembeli = $_POST['catatan_pembeli'];
    $harga_per_galon = 5000;
    $total_harga = $jumlah_galon * $harga_per_galon;

    // Masukkan pesanan ke database
    $query = "INSERT INTO pesanan (user_id, nama_depot, nama_pemesan, alamat_pemesan, jumlah_galon, total_harga, catatan, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, 'Dalam Proses')";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        die("Query gagal disiapkan: " . $db->error);
    }

    $stmt->bind_param("isssiss", $user_id, $nama_depot, $nama_pemesan, $alamat_pemesan, $jumlah_galon, $total_harga, $catatan_pembeli);

    if ($stmt->execute()) {
        echo "<script>alert('Pesanan berhasil dibuat!'); window.location.href = 'menupembeli.php';</script>";
    } else {
        echo "<script>alert('Gagal membuat pesanan: " . $stmt->error . "');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Baru</title>
    <link rel="stylesheet" href="../css/stylepesan.css">
</head>
<body>
    <div class="container">
        <h1>Pesan Galon</h1>
        <form method="POST" action="">
            <label for="jumlah_galon">Jumlah Galon</label>
            <input type="number" id="jumlah_galon" name="jumlah_galon" min="1" required placeholder="Masukkan jumlah galon">

            <label for="alamat_pemesan">Alamat Pemesan</label>
            <textarea id="alamat_pemesan" name="alamat_pemesan" rows="4" readonly>
                <?= htmlspecialchars($alamat_pemesan); ?>
            </textarea>

            <label for="catatan_pembeli">Catatan (Opsional)</label>
            <textarea id="catatan_pembeli" name="catatan_pembeli" rows="4" placeholder="Masukkan catatan untuk pesanan Anda"></textarea>

            <button type="submit">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>
