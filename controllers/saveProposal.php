<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  session_start();
  var_dump($_POST);

  require_once("../classes/models/Proposal.php");
  require_once("../classes/DAO/ProposalDAO.php");

  ProposalDAO::getInstance()->save(new Proposal($_SESSION['userId'], $_POST['idProduct'], $_POST['amount'], $_POST['value']));

  header("Location: ../Dashboard/provider.php");

?>