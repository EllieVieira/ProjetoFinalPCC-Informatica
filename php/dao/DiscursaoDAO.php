<?php
require_once 'conexao/Conexao.php';

class DiscursaoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( DiscursaoDTO $discursaoDTO ) {
        try {
            $sql = "INSERT INTO "
                . "discursao(titulo,descricao,data,imagem,usuarios_id,idiomas_id, ativo) "
                . "VALUES(:titulo,:descricao,:data,:imagem,:usuarios_id,:idiomas_id,:ativo)";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( ":titulo", $discursaoDTO->getTitulo() );
            $stmt->bindValue( ":descricao", $discursaoDTO->getDescricao() );
            $stmt->bindValue( ":data", $discursaoDTO->getData() );
            $stmt->bindValue( ":imagem", $discursaoDTO->getImagem() );
            $stmt->bindValue( ":usuarios_id", $discursaoDTO->getUsuarios_Id() );
            $stmt->bindValue( ":idiomas_id", $discursaoDTO->getIdiomas_Id() );
            $stmt->bindValue( ":ativo", true );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

    public function findByNome( $nome ) {
        try {
            $sql  = "SELECT * FROM discursao WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $nome );
            $stmt->execute();
            $discursao = $stmt->fetch( PDO::FETCH_ASSOC );
            return $discursao;
        } catch ( PDOException $e ) {
            echo "Erro ao listar o discursao: ", $e->getMessage();
        }
    }

    public function deleteById( $id ) {
        try {
            $sql  = "DELETE FROM discursao WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao excluir ", $e->getMessage();
        }
    }

    public function updateById( $id ) {
        try {
            $sql  = "UPDATE discursao SET ATIVO = 'INATIVO' where id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao excluir ", $e->getMessage();
        }
    }

    public function findById( $idd ) {
        try {
            $sql  = 'SELECT * FROM discursao WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idd );
            $stmt->execute();
            $discursao = $stmt->fetch( PDO::FETCH_ASSOC );
            return $discursao;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um discursao: ', $e->getMessage();
        }
    }

    public function update( discursaoDTO $discursaoDTO ) {
        try {
            // echo "<pre>";
            // print_r($discursaoDTO);
            // echo "</pre>";
            // exit();
            $sql = "UPDATE discursao SET "
                . "titulo=?, descricao=?, idiomas_id= ? "
                . "WHERE id= ?";

            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $discursaoDTO->getTitulo() );
            $stmt->bindValue( 2, $discursaoDTO->getDescricao() );
            $stmt->bindValue( 3, $discursaoDTO->getIdiomas_id() );
            $stmt->bindValue( 4, $discursaoDTO->getId() );

            return $stmt->execute();

        } catch ( PDOException $e ) {
            echo 'Erro ao atualizar o discursao: ', $e->getMessage();
        }
    }

    // public function buscarDados() {
    // $res = array();
    // $cmd = $this->pdo->query( "SELECT * FROM lancult_bd.discursao ORDER BY id DESC" );
    // $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
    // return $res;
    // }

    public function updateDados() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT * FROM lancult_bd.usuarios ORDER BY id DESC" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }

    public function updateDiscursao() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT * FROM lancult_bd.discursao" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }

    public function buscarEspanhol() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, discursao.ATIVO, usuarios.nome FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id WHERE discursao.idiomas_id = 3 and discursao.ATIVO = 1 ORDER BY discursao.id DESC" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;

    }
    public function buscarPortugues() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, discursao.ATIVO, usuarios.nome FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id WHERE discursao.idiomas_id = 1 and discursao.ATIVO = 1 ORDER BY discursao.id DESC" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;

    }
    public function buscarIngles() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, discursao.ATIVO, usuarios.nome FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id WHERE discursao.idiomas_id = 2 and discursao.ATIVO = 1 ORDER BY discursao.id DESC" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;

    }
    public function buscarFrances() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, discursao.ATIVO, usuarios.nome FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id WHERE discursao.idiomas_id = 4 and discursao.ATIVO = 1 ORDER BY discursao.id DESC" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }

    // Function BuscarDados -> pega dados das discussões de acordo com seu id.
    public function buscarDados( $idDiscursao ) {
        $cmd = $this->pdo->prepare( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, usuarios.nome, usuarios.perfil FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id where discursao.id = :idDiscursao" );
        $cmd->bindValue( ':idDiscursao', $idDiscursao );
        $cmd->execute();
        $res = $cmd->fetch( PDO::FETCH_ASSOC );
        return $res;
    }
    // Function publiUsuario -> pegar dados de perguntas publicas por usuarios de acordo com seu id.
    public function publiUsuario( $idCliente ) {
        $res = array();
        $cmd = $this->pdo->prepare( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, usuarios.nome, usuarios.id FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id where usuarios.id = :idd" );
        $cmd->bindValue( ':idd', $idCliente );
        $cmd->execute();
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }
    public function publicacao( $idUS ) {
        $res = array();
        $cmd = $this->pdo->prepare( "SELECT discursao.id as idD, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, usuarios.nome, usuarios.id, idiomas.nome as nomeidi FROM lancult_bd.discursao
        INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id
        INNER JOIN idiomas ON idiomas.id = discursao.idiomas_id where usuarios.id = :idd and discursao.ativo = 1" );
        $cmd->bindValue( ':idd', $idUS );
        $cmd->execute();
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }

}
