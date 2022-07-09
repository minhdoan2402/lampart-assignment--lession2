<?php 
    class Category {
        public $CategoryID;
        public $CategoryName;

        function __construct($CategoryID, $CategoryName)
        {
            $this->CategoryID = $CategoryID;
            $this->CategoryName = $CategoryName;
        }
    }
?>