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
    <link rel="stylesheet" href="../css/home.css">

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


    <div class="container">
        <nav class="nav">
            <ul>
                <li><a href="home.php">Início</a></li>
                <li><a href="/view/portugues.php">Português</a></li>
                <li><a href="/view/ingles.php">Inglês</a></li>
                <li><a href="/view/espanhol.php">Espanhol</a></li>
                <li><a href="/view/frances.php">Francês</a></li>
                <li><a href="../view/createquestion.php">Perguntar</a></li>
            </ul>
        </nav>

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

   
        

            <section class="sec-user">

                <div class="user-post">
                <h1 class="post-head">Postagens do usuário</h1>
                <?php
                    // publicacçoes do usuario
                    require_once '../php/dao/DiscursaoDAO.php';
                    $discursaoDAO = new DiscursaoDAO();
                    $publicacao   = $discursaoDAO->publicacao( $idUS );
                    if ( !empty( $publicacao ) ) {
                    foreach ( $publicacao as $public ) {?>
                <div class="link"><a href="../view/questionpage.php?id=<?=$public['idD']?>"><?php echo $public["titulo"] ?></br></a></div>
                <br>
                </strong><?php echo $public["descricao"] ?>
            <br>
                <div class="date"><?php echo $novaData = date( 'd/m/Y H:m:s', strtotime( $public["data"])) ?></br></div>
                <div class="idioma"><strong>Idioma: </strong><?php echo $public["nomeidi"] ?></br></div>
               <hr> <?php }}
                ?>
                </div>
            
              </section>  
       
    <aside class="sidebar">
        <div class="users">
            <div class="user-info">
               <?php if ( !empty( $perfilUS ) ) {
                   foreach ( $perfilUS as $dado );
                   //    print_r($dado);
                   //    exit();
               ?>
                <p><strong>Nome:</strong><?php echo $dado["nomeus"] ?></br></p>
                <br>
                <p><strong>País:</strong>                                                                                                                                                                                                                                                                                 <?php echo $dado["nome"] ?></br></p>
                <br>
                <p><strong>Tipo de usuário:</strong><?php echo $dado["nomet"] ?></br></p>
            <?php
            }
            ?>
        
    </aside>

 
</div>
</body>

</html>