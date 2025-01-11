<?php
class Login
{
    private $db;

    public function __construct()
    {
        // Gunakan koneksi global $db dari database.php
        global $db;
        $this->db = $db;
    }

    public function evaluate($data)
    {
        $email = trim($data['email']);
        $password = trim($data['password']);

        if (empty($email) || empty($password)) {
            return "Email dan password tidak boleh kosong.";
        }

        // Query untuk mendapatkan data pembeli berdasarkan email dan password
        $query = "SELECT id, nama, email, alamat, nomor_telepon FROM akunpembeli WHERE email = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Simpan data pengguna ke session
            $_SESSION['user_id'] = $user['id']; // ID pengguna
            $_SESSION['user_name'] = $user['nama']; // Nama pengguna
            $_SESSION['user_email'] = $user['email']; // Email pengguna
            $_SESSION['user_alamat'] = $user['alamat']; // Alamat pengguna
            $_SESSION['user_telepon'] = $user['nomor_telepon']; // Nomor telepon pengguna
            $_SESSION['role'] = 'pembeli'; // Role pengguna
            return ""; // Login berhasil
        }

        return "Email atau password salah.";
    }
}
?>
