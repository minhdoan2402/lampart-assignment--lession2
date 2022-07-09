<!-- router -->
<?php
session_start();
require "../config.php";
require "../connectDB.php";


require '../service/ImageService.php';

require '../model/category/Category.php';
require '../model/category/CategoryRepository.php';

require '../model/product/Product.php';
require '../model/product/ProductRepository.php';

$c = $_GET['c'] ?? "product";
$a = $_GET['a'] ?? "index";
$strController = ucfirst($c) . 'Controller';
require "controller/$strController.php";
$controller = new $strController();
$controller->$a();
?>