<?php

    require_once __DIR__."../../config/Banco.php";
    require_once __DIR__."../../models/Proposal.php";

    class ProposalDAO{
        private static $instance;

        public static function getInstance(){
            if(self::$instance === null){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function save(Proposal $proposal){
            
            $stm = Banco::getInstance()->prepare("
                INSERT INTO Proposal(idProvider, idProduct, amount, value, status) 
                VALUES (:idProvider, :idProduct, :amount, :value, :status)
            ");

            $stm->bindParam('idProvider', $proposal->idProvider);
            $stm->bindParam('idProduct', $proposal->idProduct);
            $stm->bindParam('amount', $proposal->amount);
            $stm->bindParam('value', $proposal->value);
            $stm->bindParam('status', $proposal->status);

            $stm->execute();
        }

        public function findProposal() {

            $stmt= Banco::getInstance()->query("
                SELECT * FROM Proposal
                LEFT JOIN Users ON Users.userId=Proposal.idProvider
                LEFT JOIN Products ON Products.productId=Proposal.idProduct",
            );
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function dropProposal(int $proposalId){

            $stmt = Banco::getInstance()->query("
                DELETE FROM Proposal
                WHERE proposalId=\"$proposalId\"", PDO::FETCH_OBJ
            );
            
            $stmt->execute();

            return $stmt->fetchAll();    
        }

        public function rejectedProposal(int $proposalId, string $rejeitar){

            $stmt = Banco::getInstance()->query("
                UPDATE Proposal SET 
                status = \"$rejeitar\" 
                WHERE proposalId = \"$proposalId\"", PDO::FETCH_OBJ
            );
            
            $stmt->execute();

            return $stmt->fetchAll();    
        }

        public function approvedProposal(int $proposalId, string $aprovado){

            $stmt = Banco::getInstance()->query("
                UPDATE Proposal SET 
                status = \"$aprovado\" 
                WHERE proposalId = \"$proposalId\"", PDO::FETCH_OBJ
            );
            
            $stmt->execute();

            return $stmt->fetchAll();    
        }

    }

?>