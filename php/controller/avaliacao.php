<?php

session_start();
    require_once '../../php/dao/conexao/avaconexao.php';
   
$numEstrela = $_GET['numEstrela'];
    
$discursao_id = $_POST["discursao_id"];
$resposta_id = $_POST["resposta_id"];
$usuarios_id= $_POST["usuarios_id"];
$valorAvaliacao = $_POST ["avaliacaoselect" . $numEstrela];

// var_dump($_POST);
// die();


    if (isset($valorAvaliacao)){
        // $estrela = $_POST['estrela'.$numEstrela];
        
    // print_r($numEstrela);
    // exit();

        //Salvar no banco

        $result_avaliacoes = "update respostas set PONTUACAO='$valorAvaliacao' where id = '$resposta_id '";
        $result_avaliacoes = mysqli_query($conn, $result_avaliacoes);

        // $rendimentos = mysqli_query($conexao, "select SUM(PONTUACAO) from respostas where id = $resposta_id ");
        // $rendimento = mysqli_num_rows($resultado);

        

        if(isset($conn)){
            $_SESSION['msg'] = "Avaliação cadastrada com sucesso";
        header('Location: ../../view/questionpage.php?id=' . $discursao_id.'&msg=Avaliação cadastrada com sucesso&num='.$numEstrela);
        }else{
            $_SESSION['msg'] = "Erro ao cadastrar avaliação";
        header('Location: ../../view/questionpage.php?id=' . $discursao_id);
        }

    } else{
        $_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela";
        header('Location: ../../view/questionpage.php?id=' . $discursao_id);
    }
?>

