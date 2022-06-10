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
        $DiscursaoDAO = new DiscursaoDAO();
        $dados        = $clienteDAO->buscarDados();
        $idDiscursao = $_GET['id'];
        $usu = $DiscursaoDAO->buscarDados($idDiscursao);
        var_dump( $usu );

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

    <main class="main">
        <div class="question-posted">
            <?php
                if ( isset( $_GET['msg'] ) ) {
                    echo $_GET['msg'];
                }
            ?>
        </div>

        <main class="form">
            <form action="../php/controller/2alterarDiscursaoController.php" method="POST">
                <h2>Editar pergunta</h2>
                <input type="hidden" name="id" id="id" autocomplete="off" value="<?php echo $discursao["ID"] ?>">
                <input type="text" name="titulo" id="titulo" autocomplete="off" maxlength="100"
                    value="<?php echo $usu["titulo"] ?>" required>
                <textarea name="descricao" id="descricao" cols="90" rows="4" autocomplete="off"
                    maxlength="500"><?php echo $usu["descricao"] ?></textarea>

                <select name="idiomas_id" id="idiomas_id" value="<?php echo $discursao["IDIOMAS_ID"] ?>">
                    <option value="1" <?php echo $usu["idiomas_id"] == 1 ? 'selected' : ''; ?>>Português</option>
                    <option value="2" <?php echo $usu["idiomas_id"] == 2 ? 'selected' : ''; ?>>Inglês</option>
                    <option value="3" <?php echo $usu["idiomas_id"] == 3 ? 'selected' : ''; ?>>Espanhol</option>
                    <option value="4" <?php echo $usu["idiomas_id"] == 4 ? 'selected' : ''; ?>>Francês</option>
                </select>
                <input type="submit" value="Editar questão" class="submit">
            </form>
            </div>
            </div>

        </main>


</body>

</html>