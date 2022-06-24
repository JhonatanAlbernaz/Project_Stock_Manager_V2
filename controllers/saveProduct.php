<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("../classes/models/Product.php");
  require_once("../classes/DAO/ProductDAO.php");

  session_start();

  ProductDAO::getInstance()->save(new Products($_POST['title'], $_POST['subtitle'], $_POST['description'], $_POST['image'], $_POST['value'], $_POST['inventory'], date('Y-m-d'), $_SESSION['userId']));

  header("Location: ../Dashboard/pagesManager/listProduct.php");

?>