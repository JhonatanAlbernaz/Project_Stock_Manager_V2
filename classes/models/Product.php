<?php

    class Products {
        public string $title;
        public string $subtitle;
        public string $description;
        public string $image;
        public string $value;
        public string $inventory;
        public string $createdAt;
        public string $creatorId;

        public function __construct(string $title, string $subtitle, string $description, string $image, string $value, string $inventory, $createdAt, $creatorId){
            $this->title = $title;
            $this->subtitle = $subtitle;
            $this->description = $description;
            $this->image = $image;
            $this->value = $value;
            $this->inventory = $inventory;
            $this->createdAt = date('Y-m-d');
            $this->creatorId = $_SESSION['userId'];
        }
    }
    
?>