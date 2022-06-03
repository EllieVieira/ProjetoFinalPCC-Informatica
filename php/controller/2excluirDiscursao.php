<?php
session_start();
require_once '../dao/DiscursaoDAO.php';
$id = $_GET["id"];

$discursaoDAO = new DiscursaoDAO();

$discursaoDAO->deleteById($id);
header( "Location: ../../view/home.php");