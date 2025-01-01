<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <link rel="stylesheet" href="/assest/css/stylemenuutama.css">

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

    <!-- Body -->
    <div class="container">
        <!-- Status Depot -->
        <div class="status-section">
            <div class="status">Status Depot: Buka</div>
            <div class="status-buttons">
                <button>Buka</button>
                <button>Tutup</button>
            </div>
        </div>

        <div class="title">Pesanan</div>

        <!-- Depot Card 1 -->
        <div class="depot-card">
            <img src="https://via.placeholder.com/80" alt="Foto Galon">
            <div class="depot-info">
                <h4>Nama</h4>
                <p>Jarak: 500 meter</p>
                <p>Alamat: Jalan Mawar No. 123</p>
            </div>
            <button>Pesan</button>
        </div>

        <!-- Depot Card 2 -->
        <div class="depot-card">
            <img src="https://via.placeholder.com/80" alt="Foto Galon">
            <div class="depot-info">
                <h4>Nama</h4>
                <p>Jarak: 750 meter</p>
                <p>Alamat: Jalan Melati No. 45</p>
            </div>
            <button>Pesan</button>
        </div>

        <!-- Depot Card 3 -->
        <div class="depot-card">
            <img src="https://via.placeholder.com/80" alt="Foto Galon">
            <div class="depot-info">
                <h4>Nama</h4>
                <p>Jarak: 1 km</p>
                <p>Alamat: Jalan Anggrek No. 67</p>
            </div>
            <button>Pesan</button>
        </div>

        <!-- Pesanan yang Sedang Diproses -->
        <div class="processing-section">
            <div class="title">Pesanan yang Sedang Diproses</div>
            <div class="depot-card">
                <img src="https://via.placeholder.com/80" alt="Foto Galon">
                <div class="processing-info">
                    <h4>Depot 1</h4>
                    <p>Jarak: 500 meter</p>
                    <p>Alamat: Jalan Mawar No. 123</p>
                </div>
                <button>Selesai</button>
            </div>
            </div>
        </div>
    </div>
