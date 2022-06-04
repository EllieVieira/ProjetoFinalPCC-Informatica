<?php
require_once "../dao/LoginDAO.php";
session_start();

$email    = $_POST["email"];
$password = md5( $_POST["password"] );

$loginDAO = new loginDAO();
$login    = $loginDAO->findByEmailPassword( $email, $password );

if ( !empty( $login ) ) {
    $_SESSION["login"]   = $login["NOME"];
    $_SESSION["idlogin"] = $login["ID"];
    header( "Location: ../../view/home.php" );
} else {
    $msg = "Email ou senha incorreto!";
    header( "Location: ../../view/signin.php?msg={$msg}" );
}
?>