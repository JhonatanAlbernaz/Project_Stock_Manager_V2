<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("../classes/models/Supply.php");
  require_once("../classes/DAO/SupplyDAO.php");

  $supplyId = $_GET['supplyId'];

  SupplyDAO::getInstance()->dropSupply($supplyId);

  header("Location: ../Dashboard/pagesProvider/listSupply.php");

?>