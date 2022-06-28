<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("../classes/models/Supply.php");
  require_once("../classes/DAO/SupplyDAO.php");

  SupplyDAO::getInstance()->save(new Supply($_POST['idProduct'], $_POST['amount'], $_POST['value']));

  header("Location: ../Dashboard/pagesProvider/listSupply.php");

?>