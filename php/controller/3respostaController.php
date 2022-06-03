<?php 
require_once '../dto/RespostaDTO.php';
require_once '../dao/RespostaDAO.php';
date_default_timezone_set('America/Sao_Paulo');
session_start();

$descricao = $_POST["descricao"];
$data = date( 'Y-m-d H:m:s');
$discursao_id = $_POST["discursao_id"];
$usuarios_id = $_SESSION["idlogin"];
$votos = $_POST["votos"];


$respostaDTO = new RespostaDTO();
$respostaDTO->setDESCRICAO($descricao);
$respostaDTO->setDATA($data);
$respostaDTO->setDISCURSAO_ID($discursao_id);
$respostaDTO->setUSUARIOS_ID($usuarios_id);
$respostaDTO->setvotos($votos);


$respostaDAO = new RespostaDAO();

$error[1] = "Resposta Posta!";

if ( $respostaDAO->salvarR( $respostaDTO ) ) {
    echo "Pergunta Postada!";
    header('Location: ../../view/questionpage.php?id=' . $discursao_id);
    
}