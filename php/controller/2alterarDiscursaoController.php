<?php
require_once '../dto/DiscursaoDTO.php';
require_once '../dao/DiscursaoDAO.php';

$titulo      = $_POST["titulo"];
$descrição = $_POST["descricao"];
$idiomas_id  = $_POST["idiomas_id"];
$idDiscusao  = $_POST["id"];
//$imagem = $_FILES["imagem"];

$discursaoDTO = new DiscursaoDTO();

$discursaoDTO->setTitulo( $titulo );
$discursaoDTO->setDescricao( $descrição );
$discursaoDTO->setIdiomas_Id( $idiomas_id );
$discursaoDTO->setId( $idDiscusao );

//$discursaoDTO->setImagem( isset( $imagem ) && $imagem["error"] == 0 ? $upload->getNome( $imagem ) : null );

$discursaoDAO = new discursaoDAO();
$error[1]     = "Selecione um idioma";
$pegar        = $_GET["id"];
if ( $idiomas_id == 0 ) {
    header( "Location: ../../view/editquestion.php?id={$pegar}&&msg={$error[1]} " );
} elseif ( $discursaoDAO->update( $discursaoDTO ) ) {
    header( "Location: ../../view/home.php" );
}