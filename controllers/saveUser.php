<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("../classes/models/User.php");
  require_once("../classes/DAO/UserDAO.php");

  UserDAO::getInstance()->save(new Users($_POST['name'], $_POST['email'], $_POST['password'], $_POST['userType'], $_POST['numberRecord']));

  header("Location: ../index.php");

?>