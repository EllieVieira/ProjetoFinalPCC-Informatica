<?php
    require_once '../../php/dao/conexao/classe_cadastro.php';
    $p = new con( "lancult_bd", "localhost", "root", "" );
    date_default_timezone_set( 'America/Sao_Paulo' );
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - The Lancult Town</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/normalise.css">
    <link rel="stylesheet" href="../../css/home.css">
</head>

<body>
    <!-- ================================ Funções ============================================= -->
    <?php
        session_start();
        require_once '../../php/dao/ClienteDAO.php'; //excluirClienteController.php
        $idCliente  = $_SESSION["idlogin"];
        $clienteDAO = new ClienteDAO();
        $cliente    = $clienteDAO->findById( $idCliente );

        require_once '../../php/dao/DiscursaoDAO.php';
        $discursaoDAO = new DiscursaoDAO();
        $dados        = $clienteDAO->buscarDados();
        var_dump( $dados );

    ?>
    <!-- =================================XXXXXXX========================================== -->
    <header class="header">
        <h1 class="title"><a href="../view/home.php"><img src="/images/logotipo.png" alt="Lancult Town" width="200x"
                    height="80px"></a></h1>
        <div class="mod-session">
            <div class="modify">

                <div class="btn-prof"><a href="../../view/profile.php?id=<?php echo $cliente["ID"] ?>">Meu Perfil</a>
                </div>
                <div class="btn-sair"><a href="?logout">Sair</a></div>
            </div>
            <div class="session-welcome">
                <?php
                    if ( !isset( $_SESSION["login"] ) ) {
                        header( "Location: ../../view/signin.php" );
                    }
                    if ( $cliente["PERFIL"] == 'USUARIO' ) {
                        header( "Location: ../../view/home.php" );
                    }
                    echo "Bem Vindo, {$cliente["NOME"]}!";
                    if ( isset( $_GET['logout'] ) ) {
                        unset( $_SESSION['login'] );
                        session_destroy();
                        header( 'Location: ../../view/signin.php' );
                    }

                ?>

            </div>
        </div>
    </header>
    <div>
        <?php
            foreach ( $dados as $dado ) {

            ?>
        <table border="1px">
            <tr>
                <td>id</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Titulo</td>
                <td>Data de envio</td>
                <td>Idioma</td>
                <td>Status</td>
                <td colspan="2">Análise</td>
            </tr>
            <tr>
                <td><?php echo $dado["id"]; ?></td>
                <td><?php echo $dado["nome"]; ?></td>
                <td><?php echo $dado["email"]; ?></td>
                <td><?php echo strip_tags( substr( $dado["titulo"], 0, 20 ) ) ?></td>
                <td><?php echo $novaData = date( 'd/m/Y H:m:s', strtotime( $dado["data"] ) ); ?></td>
                <td><?php //echo $dado["idiomas_id"];
                            if ( $dado["idiomas_id"] == 1 ) {
                                echo "Português";
                            } elseif ( $dado["idiomas_id"] == 2 ) {
                                echo "Inglês";
                            } elseif ( $dado["idiomas_id"] == 3 ) {
                                echo "Espanhol";
                            } elseif ( $dado["idiomas_id"] == 4 ) {
                                echo "Francês";
                        }
                        ?></td>
                <td><?php echo $dado["ativo"]; ?></td>
                <td><a href="../admin/Visualizacao.php?id=<?=$dado['id']?>">Visualizar</a></td>
                <td><a href="../../php/controller/2excluirDiscursao.php?id=<?=$dado['id']?>">Excluir</a></td>

            </tr>

        </table>
        <?php }?>
    </div>




    </div>

    <div class="container">

        <nav class="nav">
            <ul>
                <li><a href="Usuarios.php">Usuarios</a></li>
                <li><a href="Discussoes.php">Discussões</a></li>
                <li><a href="Respostas.php">Respostas</a></li>
                <li><a href="Avaliação.php">Avaliação</a></li>
            </ul>
        </nav>



    </div>

</body>

</html>