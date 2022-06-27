<?php

    require_once __DIR__."../../config/Banco.php";
    require_once __DIR__."../../models/Product.php";

    class ProductDAO{
        private static $instance;

        public static function getInstance(){
            if(self::$instance === null){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function save(Products $product){
            
            $stm = Banco::getInstance()->prepare("
                INSERT INTO Products(title, subtitle, description, image, value, inventory, createdAt, creatorId) 
                VALUES (:title, :subtitle, :description, :image, :value, :inventory, :createdAt, :creatorId)
            ");

            $stm->bindParam("title", $product->title);
            $stm->bindParam("subtitle", $product->subtitle);
            $stm->bindParam("description", $product->description);
            $stm->bindParam("image", $product->image);
            $stm->bindParam("value", $product->value);
            $stm->bindParam("inventory", $product->inventory);
            $stm->bindParam("createdAt", $product->createdAt);
            $stm->bindParam("creatorId", $product->creatorId);

            $stm->execute();
        }

        public function findProducts() {

            $stmt= Banco::getInstance()->query("
                SELECT productId, title, value, image, inventory FROM Products",
            );
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function find(int $productId){

            $stmt = Banco::getInstance()->query("
                SELECT * FROM Products
                WHERE productId=\"$productId\"", PDO::FETCH_OBJ
            );
            
            $stmt->execute();

            return $stmt->fetch();    
        }

        public function findCoursesWithFilters(string $productName = "", int $limit = 8) {
            $whereFiltroCourse = "";
            
            if($productName != ""){
                $whereFiltroCourse .= " AND (Products.title like '%$productName%' or Products.subtitle like '%$productName%')";
            }

            $SQL =  "SELECT * FROM Products
            WHERE true 
            {$whereFiltroCourse}
            LIMIT {$limit}" ;

            $stm = Banco::getInstance()->query($SQL);
            
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }

?>