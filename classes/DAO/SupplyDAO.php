<?php

    require_once __DIR__."../../config/Banco.php";
    require_once __DIR__."../../models/Supply.php";

    class SupplyDAO{
        private static $instance;

        public static function getInstance(){
            if(self::$instance === null){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function save(Supply $supply){
            
            $stm = Banco::getInstance()->prepare("
                INSERT INTO Supply(idProduct, amount, value) 
                VALUES (:idProduct, :amount, :value)
            ");

            $stm->bindParam('idProduct', $supply->idProduct);
            $stm->bindParam('amount', $supply->amount);
            $stm->bindParam('value', $supply->value);

            $stm->execute();
        }

        public function findSupply() {

            $stmt= Banco::getInstance()->query("
                SELECT * 
                FROM Supply
                LEFT JOIN Products ON Products.productId=Supply.idProduct",
            );
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function dropSupply(int $supplyId){

            $stmt = Banco::getInstance()->query("
                DELETE FROM Supply
                WHERE supplyId=\"$supplyId\"", PDO::FETCH_OBJ
            );
            
            $stmt->execute();

            return $stmt->fetchAll();    
        }

    }

?>