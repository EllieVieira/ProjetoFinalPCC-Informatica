7<?php
    require_once '../php/dao/conexao/classe_cadastro.php';
    $p = new con( "lancult_bd", "localhost", "root", "" );
    date_default_timezone_set( 'America/Sao_Paulo' );
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
    <link rel="stylesheet" href="../css/change profile.css">
</head>

<body>
    <?php
        session_start();
        require_once "../php/dao/RespostaDAO.php";
        $idd         = $_GET['id']; //identificação do usuario
        $RespostaDAO = new RespostaDAO();
        $resposta    = $RespostaDAO->findByIdR( $idd ); // dados sobre a resposta selecionada
        // var_dump($resposta);
        // exit();
    ?>

    <?php

        require_once '../php/dao/ClienteDAO.php';
        $id         = $_SESSION['idlogin'];
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $id );

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
                    echo "Bem Vindo, {$_SESSION["login"]}!";
                    if ( isset( $_GET['logout'] ) ) {
                        unset( $_SESSION['login'] );
                        session_destroy();
                        header( 'Location: ../view/signin.php' );
                    }

                ?>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="question-posted">
            <?php
                if ( isset( $_GET['msg'] ) ) {
                    echo $_GET['msg'];
                }
            ?>
        </div>

        <main class="form">
            <form action="../php/controller/3alterarRrespostaController.php" method="POST">
                <h2>Editar pergunta</h2>
                <input type="hidden" name="id" id="id" autocomplete="off" value="<?php echo $resposta["ID"] ?>">
                <textarea name="descricao" id="descricao" cols="90" rows="4" autocomplete="off" maxlength="500"><?php echo $resposta["DESCRICAO"] ?></textarea>
               <input type="submit" value="Editar Pergunta" class="submit">


            </form>
            <?php
                // print_r($resposta);
            // exit();?>
            </div>
            </div>

        </main>
        <footer class="foot">
            <strong>The Lancult Town</strong>
        </footer>

</body>

</html>