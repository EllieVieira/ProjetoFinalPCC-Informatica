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
    <title>Document</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>

    <?php
        // Sessão do cliente para inicializaçao do site
        session_start();
        require_once "../php/dao/ClienteDAO.php";
        $idCliente  = $_SESSION["idlogin"];
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $idCliente );
    ?>
<?php require_once "../php/dao/DiscursaoDAO.php";
    require_once "../php/dao/RespostaDAO.php";
    // Sessao da discursão para iniciá-la de acordo com seu id.
    $idDiscursao  = $_GET['id'];
    $DiscursaoDAO = new DiscursaoDAO();
    $discursao    = $DiscursaoDAO->findById( $idDiscursao );
    $nomes        = $DiscursaoDAO->buscarDados( $idDiscursao );
    $respostaDAO  = new RespostaDAO();
    $respostaR    = $respostaDAO->buscarDadosR( $idDiscursao );

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
                <li><a href="/view/idiomas/portugues.php">Português</a></li>
                <li><a href="/view/idiomas/ingles.php">Inglês</a></li>
                <li><a href="/view/idiomas/espanhol.php">Espanhol</a></li>
                <li><a href="/view/idiomas/frances.php">Francês</a></li>
                <li><a href="../view/createquestion.php">Perguntar</a></li>
            </ul>
        </nav>
        <main class="main">
            <section class="questions">
                <div class="question-box">
                    <?php

                        /*
                        Array ( [0] => Array ( [titulo] => Titulo [descricao] => Imagem [data] => 2022-05-13 13:05:40 [imagem] => barbie.jpg [nome] => Ellie ) [1] => Array ( [titulo] => Ola [descricao] => Tudo bem [data] => 2022-05-13 13:05:05 [imagem] => [nome] => Ellie ) )
                         */

                    ?>
                    <!-- Informações sobre a pergunta postada! -->
                    <?php
                        if ( $discursao["USUARIOS_ID"] == $idCliente ) {

                        ?>
                    <a href="../view/editquestion.php?id=<?=$discursao['ID']?>">Editar</a>
                    <a href="../php/controller/2excluirDiscursao.php?id=<?=$discursao['ID']?>">Deletar questão</a>

                    <?php
                        }
                        echo $discursao["TITULO"], "<br>";
                        echo $discursao["DESCRICAO"], "<br>";
                        echo "<img src='../user-image{$discursao["IMAGEM"]}' width='100'><br>";
                        echo "<div class='date'>", $novaData = date( 'd/m/Y H:m:s', strtotime( $discursao["DATA"] ) ), "</div><br><br>";
                        echo "<div class='name'>", $nomes['nome'], "</div><br>";

                        echo "<hr>";
                        if ( !empty( $respostaR ) ) {
                            foreach ( $respostaR as $resposta ) {
                                echo $resposta['descricao'], "<br>";

                            }
                        }
                    ?>
                </div>
            </section>
        </main>
        <main class="main">
            <section class="questions">
                <div class="question-box">
                    <form action="../php/controller/3respostaController.php" method="POST">
                        <input type="text" name="descricao" id="descricao" placeholder="Descricao" autocomplete="off"
                            maxlength="100" required>
                        <input type="hidden" name="discursao_id" id="discursao_id" autocomplete="off"
                            value="<?php echo $discursao["ID"] ?>">
                        <input type="submit" value="FAÇA SUA PERGUNTA" class="submit">
                    </form>
                </div>
            </section>
        </main>
</body>

</html>