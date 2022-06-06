<?php
    require_once '../php/dao/conexao/classe_cadastro.php';
    $p = new con( "lancult_bd", "localhost", "root", "" );
    date_default_timezone_set( 'America/Sao_Paulo' );
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Lancult Town</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/avaliacao.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../MODAL/css.css">
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
        $cliente    = $clienteDAO->findById( $idCliente );
    ?>
<?php require_once "../php/dao/DiscursaoDAO.php";
    require_once "../php/dao/RespostaDAO.php";
    // Sessao da discursão para iniciá-la de acordo com seu id.
    $idDiscursao  = $_GET['id'];
    $DiscursaoDAO = new DiscursaoDAO();
    $discursao    = $DiscursaoDAO->findById( $idDiscursao ); // id da discussao para editar e excluir
    $nomes        = $DiscursaoDAO->buscarDados( $idDiscursao ); // id para pegar as informações da discussao
    $respostaDAO  = new RespostaDAO();
    $respostaR    = $respostaDAO->buscarDadosR( $idDiscursao ); // id para pegar as informações da resposta

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
                    echo "Bem Vindo, {$cliente["NOME"]}!";
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
                            if ( $discursao["USUARIOS_ID"] == $idCliente ) {
                            ?>

                            <!-- ------------------------------------------ -->
                            <div class="buttons-edit-del">
                                <a href="../view/editquestion.php?id=<?=$discursao['ID']?>"></a>
                            </div>
       <button class="btnOpenModal" onclick="openModal()">Excluir Questão</button>
        <div class= "modal-container">
            <div class="modal">
                <h2>Info</h2>
                <hr>
                <span>Deseja excluir?</span>
                <hr>
                <div class="btns">
                    <a href="../php/controller/2excluirDiscursao.php?id=<?=$discursao['ID']?>" class="btnOK">Deletar questão</a>
                    <a class="btnClose" onclick="closeModal()">Cancelar</a>

                </div>
            </div>
        </div>


                        <?php
                        }?>
                            <div class="disc-ativo"><?php
    echo "<div class='title-disc'>", $discursao["TITULO"], "</div><br>";
echo "<div class='ativo'>", $discursao["ATIVO"], "</div><br>"; ?>
                            </div>
                            <?php
                                echo $discursao["DESCRICAO"], "<br>";
                                // echo "<img src='../user-image{$discursao["IMAGEM"]}' width='100'><br>";
                                echo "<div class='date'>", $novaData = date( 'd/m/Y H:m:s', strtotime( $discursao["DATA"] ) ), "</div><br>";
                            echo "<div class='name'>", $nomes['nome'], "</div><br>"; ?>
                <hr>
                        <h1 class="answer-head">Respostas</h1>
                <hr>
                        <?php
                            if ( !empty( $respostaR ) ) {
                                $numEstrela = 1;
                                foreach ( $respostaR as $resposta ) {
                                ?>

                    <div class="questions-buttons">
                            <?php if ( $resposta["usuarios_id"] == $idCliente ) {
                                        
                                        ?>
                    </div>
                          <div class="btn-resposta">
                              <a href="../view/editrespost.php?id=<?=$resposta['id']?>">Editar</a>
                               <a href="../php/controller/3excluirResposta.php?id=<?=$resposta['id']?>">Deletar resposta</a>
                          </div>
                        <?php }
                        ?>

<!-- <div class="questions-buttons">
                            <?php if ( $resposta["usuarios_id"] == $idCliente ) {
                                            # code...
                                        ?>
                    </div>
                          <div class="btn-resposta">
                              <a href="../view/editrespost.php?id=<?=$resposta['id']?>">Editar</a>
                               
         <button class="btnOpenModal" onclick="openModal()">Excluir Resposta</button>
        <div class= "modal-container">
            <div class="modal">
                <h2>Info</h2>
                <hr>
                <span>Deseja excluir?</span>
                <hr>
                <div class="btns">
                <a href="../php/controller/3excluirResposta.php?id=<?=$resposta['id']?>" class="btnOK" >Deletar resposta</a>
                    <a class="btnClose" onclick="closeModal()">Cancelar</a>
                    
                </div>
            </div>
        </div>

                              <a href="../php/controller/3excluirResposta.php?id=<?=$resposta['id']?>">Deletar resposta</a>
                          </div>
                        <?php }
                                ?> -->

                <div>
                    <?php
                        echo "<div class='desc'>", $resposta['descricao'], "<br><br>";
                                echo "<div class='date'>", $novaData = date( 'd/m/Y H:m:s', strtotime( $resposta["data"] ) ), "</div><br>";
                                echo "<div class='name'>", $nomes['nome'], "</div><br>";
                            ?>
                </div>
                <!-- Estrelas da Avaliação -->
                <div class="estrelas">
                                    <form action="../php/controller/avaliacao.php?numEstrela=<?=$numEstrela?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="resposta_id" id="resposta_id" autocomplete="off" value="<?php echo $resposta["id"] ?>">
                                        <input type="hidden" name="discursao_id" id="discursao_id" autocomplete="off" value="<?php echo $discursao["ID"] ?>">
                                        <input type="hidden" name="id_cliente" id="id_cliente" autocomplete="off" value="<?php echo $idCliente ?>">
                                        <input type="hidden" name="usuarios_id" id="usuarios_id" autocomplete="off" value="<?php echo $resposta["usuarios_id"] ?>">
                                        <input type="hidden" name="pontuacao" id="pontuacao" autocomplete="off" value="<?php echo $resposta["pontuacao"] ?>">
                                        <input type="hidden" name="votos" id="votos" autocomplete="off" value="<?php echo $resposta["votos"] ?>">
                                        <input type="radio" id="star_icon ativo" name="avaliacaoselect<?=$numEstrela?>" value="" <?=( $resposta['pontuacao'] == '' ? 'checked' : '' )?> <?=$resposta["votos"]?> checked />
                                        <label for="cm_star-1<?=$numEstrela?>"><i class="fa"></i></label>
                                        <input type="radio" class="star_icon" id="cm_star-1<?=$numEstrela?>" name="avaliacaoselect<?=$numEstrela?>" value="1" <?=( $resposta['pontuacao'] >= '1.0' ? 'checked' : '' )?>/>
                                        <label for="cm_star-2<?=$numEstrela?>"><i class="fa"></i></label>
                                        <input type="radio" class="star_icon" id="cm_star-2<?=$numEstrela?>" name="avaliacaoselect<?=$numEstrela?>" value="2" <?=( $resposta['pontuacao'] >= '1.9' ? 'checked' : '' )?>/>
                                        <label for="cm_star-3<?=$numEstrela?>"><i class="fa"></i></label>
                                        <input type="radio" class="star_icon" id="cm_star-3<?=$numEstrela?>" name="avaliacaoselect<?=$numEstrela?>" value="3"<?=( $resposta['pontuacao'] >= '2.9' ? 'checked' : '' )?>/>
                                        <label for="cm_star-4<?=$numEstrela?>"><i class="fa"></i></label>
                                        <input type="radio" class="star_icon" id="cm_star-4<?=$numEstrela?>" name="avaliacaoselect<?=$numEstrela?>" value="4" <?=( $resposta['pontuacao'] >= '3.9' ? 'checked' : '' )?>/>
                                        <label for="cm_star-5<?=$numEstrela?>"><i class="fa"></i></label>
                                        <input type="radio" class="star_icon" id="cm_star-5<?=$numEstrela?>" name="avaliacaoselect<?=$numEstrela?>" value="5" <?=( $resposta['pontuacao'] >= '4.9' ? 'checked' : '' )?>/>
                                        <!-- <select name="avaliacaoselect" id="avaliacaoselect">
                                            <option value="1" <?=( $resposta['pontuacao'] == '1' ? 'selected' : '' )?>>1</option>
                                            <option value="2"<?=( $resposta['pontuacao'] == '2' ? 'selected' : '' )?>>2</option>
                                            <option value="3"<?=( $resposta['pontuacao'] == '3' ? 'selected' : '' )?>>3</option>
                                            <option value="4" <?=( $resposta['pontuacao'] == '4' ? 'selected' : '' )?>>4</option>
                                            <option value="5"<?=( $resposta['pontuacao'] == '5' ? 'selected' : '' )?>>5</option>
                                        </select> -->
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
                                <div class="msg-aval">
                                    <?php
                                        if ( isset( $_GET['num'] ) ) {
                                                    # code...
                                                    if ( isset( $_GET['msg'] ) && $numEstrela == $_GET['num'] ) {
                                                        echo $_GET['msg'];
                                                        //unset($_SESSION['msg']);
                                                    }
                                                }
                                            ?>
                                    </div>
                                    <hr>
                                </div>
                                <?php
                                    $numEstrela += 1;
                                        }
                                    }
                                ?>

                    </div>
                </section>
            </main>

            <sidebar class="sidebar">
                <section class="answers">
                    <div class="answers-box">
                        <h1 class="responder">Responder</h1>
                        <form action="../php/controller/3respostaController.php" method="POST">
                        <input type="text" name="descricao" id="descricao" placeholder="Ajude seu colega! :D" autocomplete="off" maxlength="500" required>
                        <input type="hidden" name="discursao_id" id="discursao_id" autocomplete="off" value="<?php echo $discursao["ID"] ?>">
                        <input type="submit" value="Responder" class="submit">
                    </form>
                </div>
            </section>
        </sidebar>



        <script src="../MODAL/js.js"></script>
    </body>

    </html>