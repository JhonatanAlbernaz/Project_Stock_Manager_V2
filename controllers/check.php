<?php

    require_once("../classes/models/User.php");
    require_once("../classes/DAO/UserDAO.php");
    ini_set('display_errors', 1);
error_reporting(E_ALL);

    session_start();

    if($_SESSION["userType"] == 1) {

        header("Location: ../Dashboard/index.php");

    }else {

        $_SESSION["erro_login"] = "Login invalido, senha ou email invalidos";
        header("Location: ../Dashboard/provider.php");

    }
    
?>