<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/forms.css">
</head>

<body>
<?php
    session_start();
    require_once '../php/dao/LoginDAO.php'; //excluirClienteController.php
    $idCliente = $_SESSION["idlogin"];
    // var_dump( $idCliente );

?>
    <main class="form">

        <form action="../php/controller/confirmarsenhaController.php" method="post">
            <h1>Recuperar senha</h1>
            <input type="hidden" name="id" id="id" placeholder="id" value="<?php echo $idCliente ?>">
            <input type="password" name="senha" id="senha" placeholder="senha">
            <input type="password" name="confirmar" id="confirmar" placeholder="confirmar">
            <input type="submit" name="signin" id="signin" value="Entrar" class="submit">

        </form>

    </main>

    <div class="error-login">
        <?php
            if ( isset( $_GET['eee'] ) ) {
                echo $_GET['eee'];
            }
        ?>
    </div>

 

</body>

</html>