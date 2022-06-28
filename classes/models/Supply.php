<?php

    class Supply {
        public int $idProduct;
        public int $amount;
        public string $value;

        public function __construct(int $idProduct, int $amount, string $value){
            $this->idProduct = $idProduct;
            $this->amount = $amount;
            $this->value = $value;
        }
    }
    
?>