<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "bluebuk_db";

    function connect() {
        $connection = mysqli_connect($this->host,$this->username,$this->password,$this->db);
        return $connection;
    }
    function read($query) {
        $conn = $this->connect();
        $result = mysqli_query($conn,$query);

        if(!$result) {
            return false;
        }
        else {
            $data = false;
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function save($query, $params = []) {
        $conn = $this->connect();
    
        // Siapkan statement
        $stmt = mysqli_prepare($conn, $query);
    
        if ($stmt === false) {
            die("Error preparing statement: " . mysqli_error($conn));
        }
    
        // Bind parameters jika ada
        if (!empty($params)) {
            // Buat string tipe parameter (semua string di sini)
            $types = str_repeat("s", count($params));
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }
    
        // Eksekusi statement
        $result = mysqli_stmt_execute($stmt);
    
        if ($result === false) {
            die("Error executing query: " . mysqli_error($conn));
        }
    
        mysqli_stmt_close($stmt);
        return $result;
    }
    
}