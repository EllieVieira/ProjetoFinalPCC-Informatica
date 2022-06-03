<?php
require_once '../dto/RespostaDTO.php';
require_once '../dao/RespostaDAO.php';

$descricao = $_POST["descricao"];
$id          = $_POST["id"];
//$imagem = $_FILES["imagem"];

$respostaDTO = new RespostaDTO();

$respostaDTO->setDESCRICAO( $descricao );
$respostaDTO->setID( $id );
//$discursaoDTO->setImagem( isset( $imagem ) && $imagem["error"] == 0 ? $upload->getNome( $imagem ) : null );

$respostaDAO = new RespostaDAO();

if ( $respostaDAO->updateR( $respostaDTO ) ) {
    header( "Location: ../../view/home.php" );
}