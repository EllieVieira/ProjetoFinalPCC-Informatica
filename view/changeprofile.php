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
            <input type="hidden" name="id" value="<?php echo $cliente["ID"] ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $cliente["NOME"] ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $cliente["EMAIL"] ?>">
            <label for="password">Mudar ou confirmar sua senha:</label>
            <input type="password" name="password" id="password" required>

            <div class="selects">
                <label for="paises_id">País:</label>
                <select name="paises_id" id="paises_id" required>
                    <option></option>
                    <option value="1">Brasil</option>
                    <option value="2">Reino Unido</option>
                    <option value="3">EUA</option>
                    <option value="4">Espanha</option>
                    <option value="5">França</option>
                </select><br>
                <label for="tipo_id">Você é?</label>
                <select name="tipo_id" id="tipo_id" required>
                    <option></option>
                    <option value="1">Estudante</option>
                    <option value="2">Professor</option>
                    <option value="3">Nativo</option>
                </select>
            </div>
            <input type="submit" name="alterar" id="alterar" value="Editar Perfil" class="submit">
            <button class="btn btn-delete"><a href="../php/controller/1excluirClienteController.php" name="delete" id="delete" value="delete-account">Excluir Conta</a></button>
        </form>

    </main>

    <footer>
        <strong>The Lancult Town</strong>
    </footer>
</body>

</html>