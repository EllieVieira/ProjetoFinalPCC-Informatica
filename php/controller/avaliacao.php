<?php

session_start();
    require_once '../../php/dao/conexao/avaconexao.php';
   

    
$discursao_id = $_POST["discursao_id"];
$resposta_id = $_POST["resposta_id"];
$usuarios_id= $_POST["usuarios_id"];


if (!empty($_POST['estrela'])){
    $estrela = $_POST['estrela'];
    
//  print_r($estrela);
//    exit();

    //Salvar no banco

    $result_avaliacoes = "update respostas set PONTUACAO='$estrela' where id = '$resposta_id '";
    $result_avaliacoes = mysqli_query($conn, $result_avaliacoes);

    

    if(isset($conn)){
        $_SESSION['msg'] = "Avaliação cadastrada com sucesso";
    header('Location: ../../view/questionpage.php?id={$discursao_id}');
    }else{
        $_SESSION['msg'] = "Erro ao cadastrar avaliação";
    header('Location: ../../view/questionpage.php?id={$discursao_id}');
    }

} else{
    $_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela";
    header('Location: ../../view/questionpage.php?id={$discursao_id}');
}

?>

