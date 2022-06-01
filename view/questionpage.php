<?php
require_once '../php/dao/conexao/classe_cadastro.php';
$p = new con("lancult_bd", "localhost", "root", "");
date_default_timezone_set('America/Sao_Paulo');
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
    <link rel="stylesheet" href="../css/avaliacao.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- <style>
        .avaliacao{
  display: flex;
 }
.star-icon{
  list-style-type: none;
  border: 1px solid #fff;
  cursor: pointer;
  color: #ffe500;
  font-size: 40px;/* alterar o tamanho das estrelas */
}
.star-icon::before{
  content: "\2605";
}
.star-icon.ativo ~ .star-icon::before{
  content: "\2606";
}
.avaliacao:hover .star-icon::before{
  content: "\2605";
}
.star-icon:hover ~ .star-icon::before{
  content: "\2606";
}
    </style> -->
</head>

<body>

    <?php
    // Sessão do cliente para inicializaçao do site
    session_start();
    require_once "../php/dao/ClienteDAO.php";
    $idCliente  = $_SESSION["idlogin"];
    $clienteDAO = new ClienteDAO();
    $cliente    = $clienteDAO->findById($idCliente);
    ?>
    <?php require_once "../php/dao/DiscursaoDAO.php";
    require_once "../php/dao/RespostaDAO.php";
    // Sessao da discursão para iniciá-la de acordo com seu id.
    $idDiscursao  = $_GET['id'];
    $DiscursaoDAO = new DiscursaoDAO();
    $discursao    = $DiscursaoDAO->findById($idDiscursao);
    $nomes        = $DiscursaoDAO->buscarDados($idDiscursao);
    $respostaDAO  = new RespostaDAO();
    $respostaR    = $respostaDAO->buscarDadosR($idDiscursao);

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
                if (!isset($_SESSION["login"])) {
                    header("Location: ../view/signin.php");
                }
                echo "Bem Vindo, {$_SESSION["login"]}!";
                if (isset($_GET['logout'])) {
                    unset($_SESSION['login']);
                    session_destroy();
                    header('Location: ../view/signin.php');
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
                    if ($discursao["USUARIOS_ID"] == $idCliente) {

                    ?>
                        <div class="buttons-edit-del">
                            <a href="../view/editquestion.php?id=<?= $discursao['ID'] ?>">Editar</a>
                            <a href="../php/controller/2excluirDiscursao.php?id=<?= $discursao['ID'] ?>">Deletar questão</a><br>
                        </div>

                    <?php
                    }
                    echo "<div class='title-disc'>", $discursao["TITULO"], "</div><br>";
                    echo $discursao["DESCRICAO"], "<br>";
                    echo "<img src='../user-image{$discursao["IMAGEM"]}' width='100'><br>";
                    echo "<div class='date'>", $novaData = date('d/m/Y H:m:s', strtotime($discursao["DATA"])), "</div><br><br>";
                    echo "<div class='name'>", $nomes['nome'], "</div><br>"; ?>

                    <h1 class="answer-head">Respostas</h1><br>

                    <?php
                    if (!empty($respostaR)) {
                        $numEstrela = 1;
                        foreach ($respostaR as $resposta) {
                            echo $resposta['descricao'], "<br>";
                            echo "<div class='date'>", $novaData = date('d/m/Y H:m:s', strtotime($resposta["data"])), "</div><br><br>";
                            echo "<div class='name'>", $nomes['nome'], "</div><br>"; 
                    ?>

                            <!-- Estrelas da Avaliação -->

                            <div class="estrelas">
                                <form action="../php/controller/avaliacao.php?numEstrela=<?=$numEstrela?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="resposta_id" id="resposta_id" autocomplete="off" value="<?php echo $resposta["id"] ?>">
                                    <input type="hidden" name="discursao_id" id="discursao_id" autocomplete="off" value="<?php echo $discursao["ID"] ?>">
                                    <input type="hidden" name="id_cliente" id="id_cliente" autocomplete="off" value="<?php echo $idCliente ?>">
                                    <input type="hidden" name="usuarios_id" id="usuarios_id" autocomplete="off" value="<?php echo $resposta["usuarios_id"] ?>">

                                    <input type="radio" id="star_icon ativo" name="estrela<?=$numEstrela?>" value="" checked />
                                    <label for="cm_star-1<?=$numEstrela?>"><i class="fa"></i></label>
                                    <input type="radio" class="star_icon" id="cm_star-1<?=$numEstrela?>" name="estrela<?=$numEstrela?>" value="1"/>
                                    <label for="cm_star-2<?=$numEstrela?>"><i class="fa"></i></label>
                                    <input type="radio" class="star_icon" id="cm_star-2<?=$numEstrela?>" name="estrela<?=$numEstrela?>" value="2"/>
                                    <label for="cm_star-3<?=$numEstrela?>"><i class="fa"></i></label>
                                    <input type="radio" class="star_icon" id="cm_star-3<?=$numEstrela?>" name="estrela<?=$numEstrela?>" value="3"/>
                                    <label for="cm_star-4<?=$numEstrela?>"><i class="fa"></i></label>
                                    <input type="radio" class="star_icon" id="cm_star-4<?=$numEstrela?>" name="estrela<?=$numEstrela?>" value="4"/>
                                    <label for="cm_star-5<?=$numEstrela?>"><i class="fa"></i></label>
                                    <input type="radio" class="star_icon" id="cm_star-5<?=$numEstrela?>" name="estrela<?=$numEstrela?>" value="5"/>
                                    <input type="submit" value="Avaliar" name="submit-star" class="submit-star">
                                </form>


                                <!-- <select name="estrela">
                                    <option value='1' name="estrela">1</option>
                                    <option value='2' name="estrela">2</option>
                                    <option value='3' name="estrela">3</option>
                                    <option value='4' name="estrela">4</option>
                                    <option value='5' name="estrela">5</option>
                                </select>
                                <input type="submit" value="Avaliar" name="submit-star"> 
                                </form> -->
                                
                                <?php
                                if (isset($_GET['num'])) {
                                    # code...
                                    if (isset($_GET['msg']) && $numEstrela == $_GET['num']) {
                                        echo $_GET['msg'];
                                        //unset($_SESSION['msg']);
                                    }
                                }
                                
                                ?>
                                <hr>

                            </div>
                        <?php
                            $numEstrela+=1;
                        }
                    }
                        ?>
                            

                </div>
            </section>
        </main>

        <sidebar class="sidebar">
            <section class="answers">
                <div class="answers-box">
                    <form action="../php/controller/3respostaController.php" method="POST">
                        <input type="text" name="descricao" id="descricao" placeholder="Resposta! :D" autocomplete="off" maxlength="100" required>
                        <input type="hidden" name="discursao_id" id="discursao_id" autocomplete="off" value="<?php echo $discursao["ID"] ?>">
                        <input type="submit" value="Responder" class="submit">
                    </form>
                </div>
            </section>
        </sidebar>


        <!-- <script>
            var stars = document.querySelectorAll('.star-icon');
                  
                  document.addEventListener('click', function(e){
                    var classStar = e.target.classList;
                    if(!classStar.contains('ativo')){
                      stars.forEach(function(star){
                        star.classList.remove('ativo');
                      });
                      classStar.add('ativo');
                      console.log(e.target.getAttribute('value'));
                    }
                  });
        </script> -->

</body>

</html>