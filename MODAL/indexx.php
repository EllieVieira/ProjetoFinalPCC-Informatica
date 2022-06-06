<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
        <button class="btnOpenModal" onclick="openModal()">Open Modal</button>
        <div class= "modal-container">
            <div class="modal">
                <h2>Info</h2>
                <hr>
                <span>Deseja excluir?</span>
                <hr>
                <div class="btns">
                    <!-- <button class="btnOK" onclick="closeModal()">Sim</button> -->
                    <!-- <button class="btnClose" onclick="closeModal()">Não</button> -->

                    <a href="../php/controller/3excluirResposta.php?id=<?=$resposta['id']?>" class="btnOK">Deletar resposta</a>
  
                    <a href="../php/controller/2excluirDiscursao.php?id=<?=$discursao['ID']?>" class="btnClose" onclick="closeModal()">Cancelar</a>
                    
                </div>
            </div>
        </div>
        <script src="js.js"></script>
</body>
</html>