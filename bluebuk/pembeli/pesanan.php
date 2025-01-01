<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="/assest/css/styledetailpesanan.css">
    <link rel="stylesheet" href="/assest/css/stylepesan.css">

</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://via.placeholder.com/50" alt="Logo">
            <h2>Nama Website</h2>
        </div>
        <div class="user-info">
            <img src="https://via.placeholder.com/40" alt="User Foto">
            <span>Nama User</span>
        </div>
        <div class="navbar">
            <button class="menu-btn">☰</button>
            <div class="dropdown-menu">
                <a href="#">Edit Profile</a>
                <a href="#">Riwayat Pesanan</a>
                <a href="#">Tentang</a>
            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="container">
        <div class="title">Detail Pesanan</div>

        <!-- Biodata Pemesan -->
        <div class="biodata">
            <p><strong>Nama:</strong> Nama Pemesan</p>
            <p><strong>Alamat:</strong> Jalan Contoh No. 123, Kota ABC</p>
        </div>

        <!-- Order Details -->
        <div class="order-details">
            <label for="jumlah-pesanan">Jumlah Pesanan:</label>
            <input type="number" id="jumlah-pesanan" name="jumlah-pesanan" placeholder="Masukkan jumlah pesanan">

            <label for="note-pembeli">Note Pembeli:</label>
            <textarea id="note-pembeli" name="note-pembeli" rows="4" placeholder="Masukkan catatan untuk pesanan"></textarea>
        </div>

        <!-- Tombol Proses dan Tolak -->
        <div class="buttons">
            <button class="proses-btn">Pesan</button>
            <button class="tolak-btn">Batal</button>
        </div>
    </div>
</body>
</html>