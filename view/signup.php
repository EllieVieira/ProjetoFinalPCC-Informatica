<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/forms.css">
</head>

<body>
    <div class="error-signup">
        <?php
        if (isset($_GET['msg'])) {
            echo $_GET['msg'];
        }
        ?>
    </div>

    <main class="form-signup">

        <form action="../php/controller/1cadastrarClienteController.php" method="post">
            <h1>Cadastre-se</h1>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <div class="selects">
                <div>
                    <label for="paises_id">País:</label>
                    <select name="paises_id" id="paises_id">
                        <option value="1">Brasil</option>
                        <option value="2">Reino Unido</option>
                        <option value="3">EUA</option>
                        <option value="4">Espanha</option>
                        <option value="5">França</option>
                    </select>
                </div>
                <div>
                    <label for="tipo_id">Você é?</label>
                    <select name="tipo_id" id="tipo_id">
                        <option value="1">Estudante</option>
                        <option value="2">Professor</option>
                        <option value="3">Nativo</option>
                    </select>
                </div>
            </div>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" name="signup" id="signup" value="Cadastrar" class="submit">
        </form>

    </main>

    <footer>
        <strong>The Lancult Town</strong>
    </footer>

</body>

</html>