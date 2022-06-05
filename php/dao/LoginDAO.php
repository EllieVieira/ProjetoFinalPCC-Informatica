<?php
require_once 'conexao/Conexao.php';

class loginDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function findByEmailPassword( $email, $password ) {
        try {
            $sql = "SELECT * FROM usuarios " .
                "WHERE email = ? and password = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $email );
            $stmt->bindValue( 2, $password );
            $stmt->execute();
            $login = $stmt->fetch( PDO::FETCH_ASSOC );
            return $login;
        } catch ( PDOException $e ) {
            echo "Erro ao buscar o login {$e->getMessage()}";
        }
    }
    public function findByNomeEmail( $nome, $email ) {
        try {
            $sql = "SELECT * FROM usuarios " .
                "WHERE nome = ? and email = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $nome );
            $stmt->bindValue( 2, $email );
            $stmt->execute();
            $login = $stmt->fetch( PDO::FETCH_ASSOC );
            return $login;

        } catch ( PDOException $e ) {
            echo "Erro ao buscar o login {$e->getMessage()}";
        }
    }
    public function update( ClienteDTO $clienteDTO ) {
        try {
            $sql = "UPDATE usuarios SET "
                . "password = ?"
                . "WHERE id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $clienteDTO->getPassword() );
            $stmt->bindValue( 2, $clienteDTO->getId() );

            return $stmt->execute();
        } catch ( PDOException $e ) {
            echo 'Erro ao atualizar o cliente: ', $e->getMessage();
        }
    }

}