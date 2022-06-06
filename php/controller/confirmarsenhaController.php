<?php
require_once "../dao/LoginDAO.php";
require_once "../dto/ClienteDTO.php";
require_once "../dao/ClienteDAO.php";

$id = $_POST["id"];

$password2 = md5( $_POST["confirmar"] );
$password  = md5( $_POST["senha"] );
if ( $password == $password2 ) {

    $clienteDTO = new ClienteDTO();
    $clienteDTO->setId( $id );
    $clienteDTO->setpassword( $password );

    $loginDAO = new loginDAO();

    if ( $loginDAO->update( $clienteDTO ) ) {
        header( "Location: ../../view/home.php" );
    }
}else {
        $eee = "Usuario não encontrado";
        header("Location: /php/controller/confirmarsenhaController.php?eee={eee}");
    }


?>