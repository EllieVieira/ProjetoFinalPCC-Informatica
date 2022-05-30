<?php
session_start();
require_once '../dao/ClienteDAO.php';
$id = $_SESSION['idlogin'];
$clienteDAO = new ClienteDAO();

if ( $clienteDAO->deleteById( $id ) ) {
    unset($_SESSION['login']);
    session_destroy();
    header( "Location: ../../view/signup.php" );
}
