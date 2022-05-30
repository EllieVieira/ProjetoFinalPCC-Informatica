<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';
include '../../js/funcao.php';
date_default_timezone_set('America/Sao_Paulo');

$nome = $_POST["nome"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$data_cadastramento = Date('Y-m-d H:m:s');
$paises_id = $_POST["paises_id"];
$tipo_id = $_POST["tipo_id"];

$clienteDTO = new ClienteDTO();

$clienteDTO->setNome($nome);
$clienteDTO->setEmail($email);
$clienteDTO->setPassword($password);
$clienteDTO->setData_Cadastramento($data_cadastramento);
$clienteDTO->setPaises_Id($paises_id);
$clienteDTO->setTipo_Id($tipo_id);

$clienteDAO = new ClienteDAO();
$cliente = $clienteDAO->salvar($clienteDTO, $email, $password);

if (!empty($cliente)) { {
        header("Location: ../../view/home.php");
    }
} else {
    $msg = "Email já cadastrado.";
    header("Location: ../../view/signup.php?msg={$msg}");
}
