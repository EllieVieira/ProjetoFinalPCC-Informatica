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
    <main class="form">

        <form action="../php/controller/loginController.php" method="post">
            <h1>Entrar</h1>
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Senha">
            <input type="submit" name="signin" id="signin" value="Entrar" class="submit">
            <p><a href="signup.php">Não é um membro? Cadastre-se!</a></p>
            <p><a href="recuperarsenha.php">Esqueceu a senha?</a></p>
        </form>

    </main>

    <div class="error-login">
        <?php
            if ( isset( $_GET['msg'] ) ) {
                echo $_GET['msg'];
            }
        ?>
    </div>

   

</body>

</html>