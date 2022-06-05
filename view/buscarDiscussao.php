<?php
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
    <title>The Lancult Town</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <?php
        session_start();
        require_once '../php/dao/ClienteDAO.php'; //excluirClienteController.php
        $idCliente = $_SESSION["idlogin"];
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
                    if ( !isset( $_GET['discussao'] ) ) {
                        header( 'Location: ../view/home.php' );
                        exit;
                    }
                    $nome = "%" . trim( $_GET( 'discussao' ) ) . "%";
                ?>
            </div>
        </div>
    </header>


    <div class="btn-p">
        <button class="btn-pergunta"><a href="../view/createquestion.php">Perguntar</a></button>
    </div>

        <div class="container">

        <nav class="nav">
            <ul>
                <li><a href="home.php">Início</a></li>
                <li><a href="portugues.php">Português</a></li>
                <li><a href="ingles.php">Inglês</a></li>
                <li><a href="espanhol.php">Espanhol</a></li>
                <li><a href="frances.php">Francês</a></li>
            </ul>
        </nav>

    </div>
    <footer>
        <strong>The Lancult Town</strong>
    </footer>
    </div>

</body>

</html>