+<?php
    require_once "../dao/LoginDAO.php";
    session_start();

    $email = $_POST["email"];
    $nome  = $_POST["nome"];

    $loginDAO  = new loginDAO();
    $recuperar = $loginDAO->findByNomeEmail( $nome, $email );
    if ( !empty( $recuperar ) ) {
        $_SESSION["login"]   = $recuperar["NOME"];
        $_SESSION["idlogin"] = $recuperar["ID"];
        $_SESSION["email"]   = $recuperar["email"];
        header( "Location: ../../view/confirmarsenha.php" );
    } else {

        $msg = "Email ou nome incorreto!";
        header( "Location: ../../view/confirmasenha.php?msg={$msg}" );
    }
?>
?>