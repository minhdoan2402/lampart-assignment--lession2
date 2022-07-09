<?php 
    class Product {
        public $ProductID;
        public $ProductName;
        public $Featured_image;
        public $CategoryID;
        public $Category;
        
        
        function __construct($ProductID, $ProductName, $Featured_image, $CategoryID)
        {
            $this->ProductID = $ProductID;
            $this->ProductName = $ProductName;
            $this->Featured_image = $Featured_image;
            $this->CategoryID = $CategoryID;
            
        }
    }
?>