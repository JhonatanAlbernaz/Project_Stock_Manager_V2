<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("../classes/models/Proposal.php");
  require_once("../classes/DAO/ProposalDAO.php");

  $proposalId = $_GET['proposalId'];
  $aprovado = "Aprovado";

  ProposalDAO::getInstance()->approvedProposal($proposalId, $aprovado);

  header("Location: ../Dashboard/pagesManager/listProposal.php");

?>