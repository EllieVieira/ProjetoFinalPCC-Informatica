<?php
require_once '../../dto/DiscursaoDTO.php';
require_once '../../dao/DiscursaoDAO.php';

$id        = $_POST["id"];
$titulo    = $_POST["titulo"];
$descricao = $_POST["descricao"];
$idioma    = $_POST["idiomas_id"];
$status    = $_POST["ativo"];

$discursaoDTO = new DiscursaoDTO();
$discursaoDTO->setId( $id );
$discursaoDTO->setTitulo( $titulo );
$discursaoDTO->setDescricao( $descricao );
$discursaoDTO->setIdiomas_id( $idioma );
$discursaoDTO->setStatus( $status );

$discursaoDAO = new DiscursaoDAO();

if ( $discursaoDAO->updateADM( $discursaoDTO ) ) {
    header( "Location: ../../../view/admin/Visualizacao.php?id={$id}" );
}