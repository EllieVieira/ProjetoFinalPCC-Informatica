<?php
require_once 'conexao/Conexao.php';

class RespostaDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvarR( RespostaDTO $respostaDTO ) {
        try {
            $sql = "INSERT INTO "
                . "respostas(DESCRICAO, DATA, DISCURSAO_ID, USUARIOS_ID, votos) "
                . "VALUES(:descricao,:data, :discursao_id, :usuarios_id, :votos)";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( ":descricao", $respostaDTO->getDESCRICAO() );
            $stmt->bindValue( ":data", $respostaDTO->getDATA() );
            $stmt->bindValue( ":discursao_id", $respostaDTO->getDISCURSAO_ID() );
            $stmt->bindValue( ":usuarios_id", $respostaDTO->getUSUARIOS_ID() );
            $stmt->bindValue( ":votos", $respostaDTO->getVotos() );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }
    public function findByNomeR( $nome ) {
        try {
            $sql  = "SELECT * FROM resposta WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $nome );
            $stmt->execute();
            $resposta = $stmt->fetch( PDO::FETCH_ASSOC );
            return $resposta;
        } catch ( PDOException $e ) {
            echo "Erro ao listar o resposta: ", $e->getMessage();
        }
    }
    public function deleteByIdR( $id ) {
        try {
            $sql  = "DELETE FROM resposta WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao excluir ", $e->getMessage();
        }
    }
    public function findByIdR( $idd ) {
        try {
            $sql  = 'SELECT * FROM resposta WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idd );
            $stmt->execute();
            $resposta = $stmt->fetch( PDO::FETCH_ASSOC );
            return $resposta;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um resposta: ', $e->getMessage();
        }
    }
    public function updateR( respostaDTO $respostaDTO ) {
        try {
            // echo "<pre>";
            // print_r($discursaoDTO);
            // echo "</pre>";
            // exit();
            $sql = "UPDATE resposta SET "
                . "descricao=?, idiomas_id= ? "
                . "WHERE id= ?";

            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $respostaDTO->getDescricao() );
            $stmt->bindValue( 2, $respostaDTO->getDISCURSAO_ID() );
            $stmt->bindValue( 3, $respostaDTO->getID() );

            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo 'Erro ao atualizar o resposta: ', $e->getMessage();
        }
    }
    public function buscarDadosR( $idDiscursao ) {
        $res = array();
        $cmd = $this->pdo->prepare( "SELECT respostas.id, respostas.descricao, respostas.data, respostas.usuarios_id, respostas.discursao_id, usuarios.nome, respostas.pontuacao, respostas.votos FROM usuarios inner join respostas on respostas.usuarios_id = usuarios.id where respostas.discursao_id =:idDiscursao" );
        $cmd->bindValue( ':idDiscursao', $idDiscursao );
        $cmd->execute();
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }
    public function updateResposta() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT * FROM lancult_bd.resposta" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }
}
?>
