<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/change profile.css">

</head>

<body>
    <?php
        session_start();
        require_once '../php/dao/ClienteDAO.php'; //excluirClienteController.php
        $idCliente  = $_SESSION["idlogin"];
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $idCliente ); // $cliente -> id do usuario logado.

        require_once "../php/dao/DiscursaoDAO.php";
        $DiscursaoDAO = new DiscursaoDAO();
        $sabadao      = $DiscursaoDAO->publiUsuario( $idCliente ); //$sabadao-> dados sobre as discussões publicadas do usuario.

        // var_dump($sabadao);

    ?>

<header class="header">
        <h1 class="title"><a href="../view/home.php"><img src="/images/logotipo.png" alt="Lancult Town" width="200x" height="80px"></a></h1>
        <div class="mod-session">
            <div class="modify">

                <div class="btn-prof"><a href="../view/profile.php?id=<?php echo $cliente["ID"] ?>">Meu Perfil</a></div>
                <div class="btn-sair"><a href="?logout">Sair</a></div>
            </div>
            <div class="session-welcome">
                <?php
                    if ( !isset( $_SESSION["login"] ) ) {
                        header( "Location: ../view/signin.php" );
                    }
                    echo "Bem Vindo, {$cliente["NOME"]}!";
                    if ( isset( $_GET['logout'] ) ) {
                        unset( $_SESSION['login'] );
                        session_destroy();
                        header( 'Location: ../view/signin.php' );
                    }

                ?>
            </div>
        </div>
    </header>


    <main class="form">
        <form action="../php/controller/1alterarClienteController.php" method="POST">
            <h1 id="page-title">Editar Perfil</h1>
            <input type="hidden" name="id" value="<?php echo $cliente["ID"] ?>">
            <label for="nome"><strong>Nome:</strong></label>
            <input type="text" name="nome" id="nome" value="<?php echo $cliente["NOME"] ?>">
            <label for="email"><strong>Email:</strong></label>
            <input type="email" name="email" id="email" value="<?php echo $cliente["EMAIL"] ?>">
            <label for="password"><strong>Mudar ou confirmar sua senha:</strong></label>
            <input type="password" name="password" id="password" required>

            <div class="selects">
                <div>
                    <label for="paises_id"><strong>País:</strong></label>
                    <select name="paises_id" id="paises_id" required>
                        <option value="1"<?php echo $cliente['PAISES_ID'] == 1 ? 'selected' : ''; ?>>Brasil</option>
                                    <option value="2"<?php echo $cliente["PAISES_ID"] == 2 ? 'selected' : ''; ?>>Reino Unido</option>
                                    <option value="3"<?php echo $cliente["PAISES_ID"] == 3 ? 'selected' : ''; ?>>EUA</option>
                                    <option value="4"<?php echo $cliente["PAISES_ID"] == 4 ? 'selected' : ''; ?>>Espanha</option>
                                    <option value="5"<?php echo $cliente["PAISES_ID"] == 5 ? 'selected' : ''; ?>>França</option>
                    </select><br>
                </div>
                <div>
                    <label for="tipo_id"><strong>Você é?</strong></label>
                    <select name="tipo_id" id="tipo_id" required>
                        <option></option>
                        <option value="1"<?php echo $cliente['TIPO_ID'] == 1 ? 'selected' : ''; ?>>Estudante</option>
                        <option value="2"<?php echo $cliente['TIPO_ID'] == 2 ? 'selected' : ''; ?>>Professor</option>
                        <option value="3"<?php echo $cliente['TIPO_ID'] == 3 ? 'selected' : ''; ?>>Nativo</option>
                    </select>
                </div>
            </div>
            <input type="submit" name="alterar" id="alterar" value="Editar Perfil" class="submit">
            <button class="btn btn-delete"><a href="../php/controller/1excluirClienteController.php" name="delete" id="delete" value="delete-account">Excluir Conta</a></button>
        </form>

    </main>

  
</body>

</html>