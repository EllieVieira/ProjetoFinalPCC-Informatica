<?php
require_once '../dto/DiscursaoDTO.php';
require_once '../dao/DiscursaoDAO.php';
require_once '../../util/Upload.php';
date_default_timezone_set( 'America/Sao_Paulo' );
session_start();

define( 'DIR_IMAGEM', $_SERVER['DOCUMENT_ROOT'] . "../../user-image" );

// dados do formulario
$titulo      = $_POST["titulo"];
$descrição = $_POST["descricao"];
$data        = date( 'Y-m-d H:m:s' );
//$imagem = $_FILES['imagem'];
$usuarios_id = $_SESSION["idlogin"];
$idiomas_id  = $_POST["idiomas_id"];

//$upload = new Upload( $imagem );

$discursaoDTO = new DiscursaoDTO();

$discursaoDTO->setTitulo( $titulo );
$discursaoDTO->setDescricao( $descrição );
$discursaoDTO->setData( $data );
$discursaoDTO->setImagem( isset( $imagem ) && $imagem["error"] == 0 ? $upload->getNome( $imagem ) : null );
$discursaoDTO->setUsuarios_Id( $usuarios_id );
$discursaoDTO->setIdiomas_Id( $idiomas_id );

$discursaoDAO = new DiscursaoDAO();
// $discursao["iddiscursao"] = $discursao["ID"];

// var_dump( $idiomas_id );
// die();
$error[1] = "Pergunta Postada!";
$error[2] = "Selecione um idioma";

if ( $idiomas_id == 0 ) {
    header( "Location: ../../view/createquestion.php?msg={$error[2]}" );
} elseif ( $discursaoDAO->salvar( $discursaoDTO ) ) {
    switch ( $idiomas_id ) {
    case 1:
        header( "Location: ../../view/portugues.php?msg={$error[1]}" );
        break;

    case 2:
        header( "Location: ../../view/ingles.php?msg={$error[1]}" );
        break;
    case 3:
        header( "Location: ../../view/espanhol.php?msg={$error[1]}" );
        break;

    case 4:
        header( "Location: ../../view/frances.php?msg={$error[1]}" );
        break;
    }
}

// $discursao = $discursaoDAO->findByNome( $nome );

// $error[1] = "Pergunta Postada!";
// $error[2] = "Já existe um discursao cadastro com esse email ";

// if ( empty( $discursao ) ) {

// if ( $discursao->salvar( $discursaoDTO, $titulo, $descrição) ) {
//     header( "Location: ../view/formCadastrardiscursao.php?msg={$error[1]}" );
//     header( "Location: ../../home.php" ) ;
// }
// } else {
//     header( "Location: ../view/formCadastrardiscursao.php?msg={$error[2]}" );
// }