<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("../classes/models/Proposal.php");
  require_once("../classes/DAO/ProposalDAO.php");

  $proposalId = $_GET['proposalId'];

  ProposalDAO::getInstance()->dropProposal($proposalId);

  header("Location: ../Dashboard/pagesProvider/listProposal.php");

?>