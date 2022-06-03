<?php
session_start();
require_once '../dao/DiscursaoDAO.php';
$id = $_GET["id"];

$discursaoDAO = new DiscursaoDAO();

$discursaoDAO->updateById($id);
header( "refresh: 0.2.   ../../view/home.php");