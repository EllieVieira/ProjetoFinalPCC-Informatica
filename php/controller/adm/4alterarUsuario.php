<?php
require_once '../../dto/ClienteDTO.php';
require_once '../../dao/ClienteDAO.php';

$id    = $_POST["id"];
$nome  = $_POST["nome"];
$email = $_POST["email"];
$ativo = $_POST["ativo"];

$clienteDTO = new ClienteDTO();
$clienteDTO->setId( $id );
$clienteDTO->setNome( $nome );
$clienteDTO->setEmail( $email );
$clienteDTO->setStatus( $ativo );
echo "<pre>", var_dump( $clienteDTO );

$clienteDAO = new ClienteDAO();
if ( $clienteDAO->updateBasic( $clienteDTO ) ) {
    header( "Location: ../../../view/admin/VisualizacaoUsu.php?id={$id}" );
}
?>