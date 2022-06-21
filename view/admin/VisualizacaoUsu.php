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
        $cliente    = $clienteDAO->findById( $idCliente ); ///dados do usúario logado

        require_once '../../php/dao/DiscursaoDAO.php';
        $DiscursaoDAO = new DiscursaoDAO(); ///dados da discussão

        $idUS     = $_GET['id'];
        $perfilUS = $clienteDAO->buscarDadosPerfilUS( $idUS );
        var_dump( $perfilUS );

    ?>
    <!-- =================================XXXXXXX========================================== -->
    <header class="header">
        <h1 class="title"><a href="../home.php"><img src="/images/logotipo.png" alt="Lancult Town" width="200x"
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
    <!-- =================================XXXXXXX========================================== -->

    <main class="">
        <div class="question-posted">
            <?php
                if ( isset( $_GET['msg'] ) ) {
                    echo $_GET['msg'];
                }
            ?>
        </div>

        <main class="">
            <form action="../../php/controller/adm/4alterarUsuario.php" method="POST">
                <h2>Editar perfil</h2>
                <input type="text" name="id" id="id" autocomplete="off" value="<?php echo $_GET["id"] ?>">
                <input type="text" name="nome" id="nome" autocomplete="off" maxlength="100" value="<?php echo $perfilUS[0]["nomeus"]; ?>" required>
                <input type="text" name="email" id="email" autocomplete="off" maxlength="100" value="<?php echo $perfilUS[0]["email"]; ?>" required>
                <input type="radio" name="ativo" id="at" value="1" checked>
                <label for="at">Ativo</label><br>
                <input type="radio" name="ativo" id="in" value="2">
                <label for="in">Inativo</label><br>
                <input type="submit" value="Editar perfil" class="submit">
            </form>
        </main>
        <aside class="sidebar">
        <div class="users">
            <div class="user-info">
               <?php if ( !empty( $perfilUS ) ) {
                       foreach ( $perfilUS as $dado );
                       //    print_r($dado);
                       //    exit();
                   ?>
                <p><strong>Nome: </strong><?php echo $dado["nomeus"] ?></br></p>
                <br>
                <p><strong>País: </strong>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <?php echo $dado["nome"] ?></br></p>
                <br>
                <p><strong>Tipo de usuário: </strong><?php echo $dado["nomet"] ?></br></p>
            <?php
                }
            ?>

    </aside>

</body>

</html>