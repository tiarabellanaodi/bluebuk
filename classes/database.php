<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$database = "bluebuk_db";

// Membuat koneksi ke database
$db = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($db->connect_error) {
    die("Koneksi ke database gagal: " . $db->connect_error);
}
?>