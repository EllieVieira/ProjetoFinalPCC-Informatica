<?php
session_start();
require_once '../dao/RespostaDAO.php';
$id = $_GET["id"];

$respostaDAO = new RespostaDAO();

$respostaDAO->updateById( $id );
header( "refresh: 0.2.   ../../view/home.php" );