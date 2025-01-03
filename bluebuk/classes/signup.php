<?php
class Signup {
    private $error = "";

    private function create_userid() {
       $length = rand(4,19);
       $number = "";
       for($i=1; $i < $length; $i++) {
        $new_rand = rand(0,9);
        $number = $number . $new_rand; 

       }
        return $number;
    }

    public function evaluate($data) {
        foreach ($data as $key => $value) { // Perbaikan typo
            if (empty($value)) {
                $this->error .= $key . " is empty <br>";
            }
        }
        if (!preg_match("/^[a-zA-Z\s]+$/", $data['nama'])) {
            $this->error .= "Nama hanya boleh mengandung huruf dan spasi.<br>";
        }
    
        // Validasi email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error .= "Email tidak valid.<br>";
        }

        if ($this->error == "") {
            // No error
            $this->create_user($data);
        } else {
            return $this->error;
        }
    }

    public function create_user($data) {
        $nama = $data['nama'];
        $email = $data['email'];
        $password = $data['password'];
        $alamat = $data['alamat'];
        $userid = $this->create_userid();
    
        $query = "INSERT INTO user (userid, nama, email, password, alamat) VALUES (?, ?, ?, ?, ?)";
        $DB = new Database();
        $DB->save($query, [$userid, $nama, $email, $password, $alamat]);

        header("Location: index.php");
        exit;
    }
    
    
}
