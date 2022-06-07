<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';


$nome = $_POST["nome"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$paises_id = $_POST["paises_id"];
$tipo_id = $_POST["tipo_id"];
$id = $_POST["id"];

$clienteDTO = new ClienteDTO();

$clienteDTO->setNome($nome);
$clienteDTO->setEmail($email);
$clienteDTO->setPassword($password);
$clienteDTO->setPaises_id($paises_id);
$clienteDTO->setTipo_id($tipo_id);
$clienteDTO->setId($id);


$clienteDAO = new ClienteDAO();

if ($clienteDAO->update($clienteDTO)) {
    header("Location: ../../view/profile.php");
}
