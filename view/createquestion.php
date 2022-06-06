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
    <link rel="stylesheet" href="../css/change profile.css">
    <link rel="stylesheet" href="/view/teste/Trumbowyg-main/dist/ui/trumbowyg.css">

</head>

<body>
    <?php
        session_start();
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

    <div class="question-posted">
            <?php
                //Ellie põe uma div na parte superior da caixa pergunta :C
                if ( isset( $_GET['msg'] ) ) {
                    echo $_GET['msg'];
                }
            ?>
        </div>
    <main class="main">
        
            <main class="form">
                    <form action="../php/controller/2discursaoController.php" method="POST">
                        <h2>Qual a sua pergunta?</h2>
                        <input type="text" name="titulo" id="titulo" placeholder="Título" autocomplete="off" maxlength="100" required>
                        <textarea name="descricao" id="trumbowyg-editor" value="<?php echo $discursao["DESCRICAO"] ?>" placeholder="Descrição(Opcional)" spellcheck="true"></textarea>
                        <!-- <input type="file" name="imagem" id="imagem" class="imagem"> -->
                        <select name="idiomas_id" id="idiomas_id" class="select-idioma" required>
                            <option value="0">Selecionar Idioma:</option>
                            <option value="1">Português</option>
                            <option value="2">Inglês</option>
                            <option value="3">Espanhol</option>
                            <option value="4">Francês</option>
                        </select>
                        <input type="submit" value="FAÇA SUA PERGUNTA" class="submit">
                    </form>
                </div>
            </div>
            </div>

        </main>
<<<<<<< HEAD
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/view/teste/Trumbowyg-main/dist/trumbowyg.min.js"></script>

        <script>
            $('#trumbowyg-editor').trumbowyg({
            btns: [['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['insertImage'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']],
            autogrow: true
            });
        </script>
=======
        
        
>>>>>>> 0f24d7fa202102c4aa9c1b6fdb6e4653022b8737

</body>

</html>