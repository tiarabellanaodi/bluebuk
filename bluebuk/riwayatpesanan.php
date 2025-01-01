<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="/assest/css/styledetailpesanan.css">
    <link rel="stylesheet" href="/assest/css/styleriwayat.css">


</head>
<body>
    <!-- Header -->
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

    <div class="content">
        <h1>Riwayat Pesanan</h1>
        
        <!-- Pilihan Jangka Waktu -->
        <div class="filter">
            <label for="timeframe">Pilih Jangka Waktu:</label>
            <select id="timeframe">
                <option value="today">Hari Ini</option>
                <option value="week">1 Minggu</option>
                <option value="month">1 Bulan</option>
                <option value="year">1 Tahun</option>
            </select>
        </div>

        <!-- Daftar Pesanan -->
        <div class="order-details">
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Pesanan akan ditampilkan di sini -->
                    <tr>
                        <td>#12345</td>
                        <td>2025-01-01</td>
                        <td>2</td>
                        <td>Selesai</td>
                        <td>Rp 500.000</td>
                    </tr>
                    <tr>
                        <td>#12346</td>
                        <td>2025-01-02</td>
                        <td>3</td>
                        <td>Dalam Proses</td>
                        <td>Rp 200.000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tombol Download -->
        <div class="download">
            <button onclick="downloadData()">Download Riwayat</button>
        </div>
    </div>

    <!-- Footer -->
  
    <script src="script.js"></script>
</body>
</html>
