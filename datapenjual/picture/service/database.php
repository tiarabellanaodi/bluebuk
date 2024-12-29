<?php
$servername = "localhost";  // Biasanya localhost untuk server lokal
$username = "root";         // Username default di XAMPP
$password = "";             // Password default di XAMPP (kosong)
$dbname = "Bluebuk";        // Nama database yang sudah Anda buat (Bluebuk)

// Membuat koneksi
$db = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
?>