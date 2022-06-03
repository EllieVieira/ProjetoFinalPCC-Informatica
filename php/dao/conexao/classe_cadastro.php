<?php
Class Con {

    private $pdo;

    public function __construct( $dbname, $host, $user, $senha ) {
        try {
            $this->pdo = new PDO( "mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha );
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        } catch ( Exception $e ) {
            echo $e->getMessage();
        }
    }

    public function buscarDados() {
        $res = array();
        $cmd = $this->pdo->query( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, discursao.ativo, usuarios.nome FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id where discursao.ativo = 1 ORDER BY discursao.id DESC" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }

    public function buscarDadosDisc() {
        $cmd = $this->pdo->prepare( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.data, discursao.imagem, usuarios.nome FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id ORDER BY discursao.id DESC" );
        $cmd->execute();
        $ant = $cmd->fetchAll( PDO::FETCH_LAZY );
        return $ant;
    }

    // public function buscarDadosR(){
    // $res = array();
    // $cmd = $this->pdo->query ("SELECT respostas.id, respostas.descricao, respostas.data, respostas.usuarios_id, usuarios.nome FROM respostas inner join usuarios on respostas.id = usuarios.id;. ")
    // }
}