<?php

session_start();
    require_once '../../php/dao/conexao/classe_cadastro.php';
    
   
  
if (!empty($_POST['estrela'])){
    $estrela = $_POST['estrela'];


//  print_r($estrela);
//    exit();

    //Salvar no banco

    $result_avaliacoes = "insert into respostas (pontuacao) values ('$estrela')";
    $result_avaliacoes = mysqli_query($pdo, $result_avaliacoes);

    if(mysqli_insert_id($pdo)){
        $_SESSION['msg'] = "Avaliação cadastrada com sucesso";
    header('Location: ../../view/questionpage.php?id=$discursao["ID"]');
    }else{
        $_SESSION['msg'] = "Erro ao cadastrar avaliação";
    header('Location: ../../view/questionpage.php?id=$discursao["ID"]');
    }

} else{
    $_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela";
    header('Location: ../../view/questionpage.php?id=$discursao["ID"]');
}

?>

