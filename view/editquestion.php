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
    <title>Document</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/change profile.css">
</head>

<body>
    <?php
    session_start();
    require_once "../php/dao/DiscursaoDAO.php";
    $idDiscursao = $_GET['id'];
    $DiscursaoDAO = new DiscursaoDAO();
    $discursao = $DiscursaoDAO->findById($idDiscursao);
    ?>

    <?php

    require_once '../php/dao/ClienteDAO.php';
    $id = $_SESSION['idlogin'];
    $clienteDAO = new ClienteDAO();
    $cliente = $clienteDAO->findById($id);

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

    <main class="main">
        <div class="question-posted">
            <?php
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
            ?>
        </div>

        <main class="form">
            <form action="../php/controller/2alterarDiscursaoController.php" method="POST">
                <h2>Editar pergunta</h2>
                <input type="hidden" name="id" id="id" autocomplete="off" value="<?php echo $discursao["ID"] ?>">
                <input type="text" name="titulo" id="titulo" autocomplete="off" maxlength="100" value="<?php echo $discursao["TITULO"] ?>">
                <textarea name="descricao" id="descricao" cols="90" rows="4" autocomplete="off" maxlength="500"><?php echo $discursao["DESCRICAO"] ?></textarea>
                <input type="file" name="imagem" id="imagem" value="<?php echo $discursao["IMAGEM"] ?>">
                <select name="idiomas_id" id="idiomas_id" value="<?php echo $discursao["IDIOMAS_ID"] ?>">
                    <option value="0">Selecionar Idioma:</option>
                    <option value="1">Português</option>
                    <option value="2">Inglês</option>
                    <option value="3">Espanhol</option>
                    <option value="4">Francês</option>
                </select>
                <input type="submit" value="ASK YOUR QUESTION" class="submit">
            </form>
            </div>
            </div>

        </main>
        <footer class="foot">
            <strong>The Lancult Town</strong>
        </footer>

</body>

</html>