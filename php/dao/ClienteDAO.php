<?php
require_once 'conexao/Conexao.php';

class ClienteDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar( ClienteDTO $clienteDTO ) {
        try {
            $sql = "INSERT INTO "
                . "usuarios(nome,email,password,data_cadastramento,paises_id,tipo_id) "
                . "VALUES(:nome,:email,:password,:data_cadastramento,:paises_id,:tipo_id)";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( ":nome", $clienteDTO->getNome() );
            $stmt->bindValue( ":email", $clienteDTO->getEmail() );
            $stmt->bindValue( ":password", $clienteDTO->getPassword() );
            $stmt->bindValue( ":data_cadastramento", $clienteDTO->getData_cadastramento() );
            $stmt->bindValue( ":paises_id", $clienteDTO->getPaises_Id() );
            $stmt->bindValue( ":tipo_id", $clienteDTO->getTipo_Id() );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

    public function findAll() {
        try {
            $sql  = "SELECT * FROM usuarios";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $clientes = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $clientes;
        } catch ( PDOException $e ) {
            echo "Erro ao listar os clientes: ", $e->getMessage();
        }
    }

    public function buscarDados() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT * FROM lancult_bd.usuarios ORDER BY id DESC" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }

    public function deleteById( $id ) {
        try {
            $sql  = "DELETE FROM usuarios WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo "Erro ao excluir ", $e->getMessage();
        }
    }

    public function findById( $id ) {
        try {
            $sql  = 'SELECT * FROM usuarios WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
            return $cliente;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um cliente: ', $e->getMessage();
        }
    }

    public function update( ClienteDTO $clienteDTO ) {
        try {
            $sql = "UPDATE usuarios SET "
                . "nome=?, email=?, password=?, paises_id=?,tipo_id=? "
                . "WHERE id= ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $clienteDTO->getNome() );
            $stmt->bindValue( 2, $clienteDTO->getEmail() );
            $stmt->bindValue( 3, $clienteDTO->getPassword() );
            $stmt->bindValue( 4, $clienteDTO->getPaises_id() );
            $stmt->bindValue( 5, $clienteDTO->getTipo_id() );
            $stmt->bindValue( 6, $clienteDTO->getId() );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo 'Erro ao atualizar o cliente: ', $e->getMessage();
        }
    }

    public function findByName( $name ) {
        try {
            $sql  = "SELECT * FROM usuarios WHERE name = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $name );
            $stmt->execute();
            $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
            return $cliente;
        } catch ( PDOException $e ) {
            echo "Erro ao listar o cliente: ", $e->getMessage();
        }
    }

    public function buscarDadosC() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT usuarios.id, usuarios.paises_id, usuarios.tipo_id FROM lancult_bd.usuarios  WHERE usuarios.id" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }
    public function buscarDadosPerfilUS( $idUS ) {
        $res = array();
        $cmd = $this->pdo->prepare( "SELECT usuarios.id, usuarios.nome as nomeus, usuarios.paises_id, usuarios.tipo_id, paises.nome, tipo.nome as nomet FROM lancult_bd.usuarios
        INNER JOIN paises ON paises.id = usuarios.paises_id
        INNER JOIN tipo ON tipo.id = usuarios.tipo_id where usuarios.id = :idUS" );
        $cmd->bindValue( ':idUS', $idUS );
        $cmd->execute();
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;

    }

    public function buscarDiscussao( $nome ) {
        // SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, usuarios.nome, usuarios.id FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id where discursao.descricao like
        $cmd = $this->pdo->prepare( " SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, usuarios.nome,  usuarios.id as usuid FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id where discursao.titulo like :nome" );
        $cmd->bindValue( ":nome", $nome );
        $cmd->execute();
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }
}