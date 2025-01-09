<?php
class Login {
    private $error = "";

   
    public function evaluate($data) {
       
        $email = $data['email'];
        $password = $data['password'];
    
        $query = "SELECT * FROM user where email = '$email' limit 1 ";
        $DB = new Database();
        $result = $DB->read($query, [$email, $password]);

        if($result){
            $row = $result[0];
            if ($password == $row['password']){
                $_SESSION['bluebuk_ userid'] = $row['userid'];

            } else{
                $this->error .= "salah email";
            }
        } else {
            $this->error.= "salah email";
        }
        exit;
    }
    
    
}
