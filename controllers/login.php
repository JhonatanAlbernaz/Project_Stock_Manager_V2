<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

    require_once("../classes/models/User.php");
    require_once("../classes/DAO/UserDAO.php");

    $user = UserDAO::getInstance()->findbyemail($_POST['email']);

    if(password_verify($_POST['password'], $user->password)){

        session_start();

        $_SESSION['logedIn'] = true;
        $_SESSION['userId'] = $user->userId;
        $_SESSION["email"] = $user->email;
        $_SESSION["userType"] = $user->userType;
        $_SESSION["name"] = $user->name;

        header("Location: check.php");
        
    }else header('Location: ../index.php');
    
?>