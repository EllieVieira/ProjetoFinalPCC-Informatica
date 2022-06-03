<?php
require_once '../php/dao/conexao/classe_cadastro.php';
$p = new con("lancult_bd", "localhost", "root", "");
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/change profile.css">

</head>

<body>
    <?php
    session_start();
    require_once '../php/dao/ClienteDAO.php'; //excluirClienteController.php
    $idCliente = $_SESSION["idlogin"];
    $clienteDAO = new ClienteDAO();
    $cliente = $clienteDAO->findById($idCliente);
    $perfil = $p->buscarDadosPerfil();
    ?>

    <header class="header">
        <h1 class="title"><a href="../view/home.php">The Lancult Town</a></h1>
        <div class="mod-session">
            <div class="modify">
                <a href="../view/changeprofile.php?id=<?php echo $cliente["ID"] ?>">Editar Perfil</a>
                <a href="?logout">Sair</a>
            </div>
            <div class="session-welcome">
                <?php
                if (!isset($_SESSION["login"])) {
                    header("Location: ../view/signin.php");
                }
                echo "Bem Vindo, {$_SESSION["login"]}!";
                if (isset($_GET['logout'])) {
                    unset($_SESSION['login']);
                    session_destroy();
                    header('Location: ../view/signin.php');
                }

                ?>
            </div>
        </div>
    </header>


    <main class="form">
        <form action="../php/controller/1alterarClienteController.php" method="POST">
            <h1 id="page-title">Editar Perfil</h1>
            <?php
            if (!empty($perfil)) {

                foreach ($perfil as $dado);

                // echo '<pre>';
                // var_dump($dado);
                // '</pre>';
                // exit();
                
            ?>

                <p><strong>Nome:</strong> <?php echo $cliente["NOME"] ?></p>
                <p><strong>Email:</strong> <?php echo $cliente["EMAIL"] ?></p>
                <p><strong>País:</strong> <?php echo $dado["nome"] ?></p>
                <p><strong>Tipo de usuário:</strong> <?php echo $dado["nomet"] ?></p>
            <?php
            }
            ?>

    </main>


    <footer class="foot">
        <strong>The Lancult Town</strong>
    </footer>
</body>

</html>