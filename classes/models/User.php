<?php

    class Users {
        public string $name;
        public string $email;
        public string $password;
        public int $userType;
        public string $numberRecord;
        public string $createdAt;

        public function __construct(string $name ,string $email, string $password, int $userType, string $numberRecord){
            $this->name = $name;
            $this->email = $email;
            $this->password = password_hash($password, PASSWORD_BCRYPT);
            $this->userType = $userType;
            $this->numberRecord = $numberRecord;
            $dataAtual = new DateTime();
            $this->createdAt = $dataAtual->format("Y-m-d");
        }
    }
    
?>