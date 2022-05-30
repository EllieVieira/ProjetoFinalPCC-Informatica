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
        $idCliente  = $_SESSION["idlogin"];
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $idCliente );
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
    <div class="container">
        <nav class="nav">
            <ul>
                <li><a href="home.php">Início</a></li>
                <li><a href="portugues.php">Português</a></li>
                <li><a href="ingles.php">Inglês</a></li>
                <li><a href="espanhol.php">Espanhol</a></li>
                <li><a href="frances.php">Francês</a></li>
                <li><a href="../view/createquestion.php">Perguntar</a></li>
            </ul>
        </nav>
        <main class="main">
            <?php if ( isset( $_GET['msg'] ) ) {?>
            <fieldset>
                <div class="question-posted">
                    <?php echo $_GET['msg']; ?>
                </div>

            </fieldset>
            <?php }?>
            <section class="questions">
                <div class="question-box">
                    <?php
                        require_once "../php/dao/DiscursaoDAO.php";
                        $discursaoDAO = new DiscursaoDAO();
                        $dados        = $discursaoDAO->buscarIngles();

                        /*
                        Array ( [0] => Array ( [titulo] => Titulo [descricao] => Imagem [data] => 2022-05-13 13:05:40 [imagem] => barbie.jpg [nome] => Ellie ) [1] => Array ( [titulo] => Ola [descricao] => Tudo bem [data] => 2022-05-13 13:05:05 [imagem] => [nome] => Ellie ) )
                         */

                    if ( !isset( $_SESSION["login"] ) ) {?>
                    <div class="questions-buttons">
                        <a href="../view/editquestion.php?id=<?=$dado['id']?>">Editar</a>
                        <a href="../php/controller/2excluirDiscursao.php?id=<?=$dado['id']?>">Deletar questão</a>
                    </div><?php
                              }

                              if ( !empty( $dados ) ) {
                                  foreach ( $dados as $dado ) {
                                  ?>

                    <a href="../view/editquestion.php?id=<?=$dado['id']?>">Editar</a>
                    <a href="../php/controller/2excluirDiscursao.php?id=<?=$dado['id']?>">Deletar questão</a>
                    <a href="../view/questionpage.php?id=<?=$dado['id']?>">
                        <h2><?php echo $dado['titulo'] ?></h2>
                    </a>
                    <?php

                                echo $dado["descricao"], "<br>";
                                echo "<img src='../user-image{$dado["imagem"]}' width='100'><br>";
                                echo "<div class='date'>", $novaData = date( 'd/m/Y H:m:s', strtotime( $dado["data"] ) ), "</div><br><br>";
                                echo "<div class='name'>", $dado["nome"], "</div><br>";

                                echo "<hr>";
                            }
                        } else {
                        ?>
                    <div class="aviso">
                        <h4>Não há questões aqui!</h4>
                    </div>
                    <?php
                        }
                    ?>

                </div>
            </section>
        </main>
        <aside class="sidebar"></aside>

    </div>
    <footer>
        <strong>The Lancult Town</strong>
    </footer>
    </div>

</body>

</html>