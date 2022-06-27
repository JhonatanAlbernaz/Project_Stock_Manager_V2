<?php

    require_once __DIR__."../../config/Banco.php";
    require_once __DIR__."../../models/User.php";

    class UserDAO{
        private static $instance;

        public static function getInstance(){
            if(self::$instance === null){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function save(Users $user){
            
            $stm = Banco::getInstance()->prepare("
                INSERT INTO Users(name, email, password, userType, numberRecord, createdAt) 
                VALUES (:name, :email, :password, :userType, :numberRecord, :createdAt)
            ");

            $stm->bindParam('name', $user->name);
            $stm->bindParam('email', $user->email);
            $stm->bindParam('password', $user->password);
            $stm->bindParam('userType', $user->userType);
            $stm->bindParam('numberRecord', $user->numberRecord);
            $stm->bindParam('createdAt', $user->createdAt);

            $stm->execute();
        }

        public function findbyemail($email) {

            $user = Banco::getInstance()->query("
                SELECT userId, name, email, password, userType 
                FROM Users
                WHERE email = \"$email\"", PDO::FETCH_OBJ
            );

            $user->execute();
            
            return $user->fetch();
        }

        public function findProvider() {

            $stmt = Banco::getInstance()->query("
                SELECT userId, name, email, numberRecord
                FROM Users
                WHERE userType = 2", 
            );

            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }

?>