<?php

    class Proposal {
        public int $idProvider;
        public int $idProduct;
        public int $amount;
        public string $value;

        public function __construct(int $idProvider, int $idProduct, int $amount, string $value){
            $this->idProvider = $_SESSION['userId'];
            $this->idProduct = $idProduct;
            $this->amount = $amount;
            $this->value = $value;
            $this->status = 'Pendente';
        }
    }
    
?>