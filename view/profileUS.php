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
    <title>Change Profile</title>
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
        $cliente    = $clienteDAO->findById( $idCliente );
        $perfil     = $p->buscarDadosPerfil();
        $idUS       = $_GET['id'];
        $perfilUS   = $clienteDAO->buscarDadosPerfilUS( $idUS );
        // echo "<pre>", var_dump( $perfilUS );
    ?>

    <header class="header">
        <h1 class="title"><a href="../view/home.php">The Lancult Town</a></h1>
        <div class="mod-session">
            <div class="modify">
                <a href="../view/profile.php?id=<?php echo $cliente["ID"] ?>">Perfil</a>
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
<!-- array(1) {
     [0]=>
    array(5) {

    ["id"]=>
    int(49)

    ["nome"]=>
    string(6) "Brasil"

    ["paises_id"]=>
    int(1)

    ["tipo_id"]=>
    int(1)

    ["nomet"]=>
    string(9) "Estudante"
  }
} -->

    <main class="form">
   <?php if ( !empty( $perfilUS ) ) {

           foreach ( $perfilUS as $dado );

        //    print_r($dado);
        //    exit();

       ?>

        <p><strong>Nome:</strong><?php echo $dado["nomeus"] ?></br></p>
        <br>
        <p><strong>País:</strong> <?php echo $dado["nome"] ?></br></p>
        <br>
        <p><strong>Tipo de usuário:</strong><?php echo $dado["nomet"] ?></br></p>
        
<?php
    }
?>
    </main>


    <footer class="foot">
        <strong>The Lancult Town</strong>
    </footer>
</body>

</html>