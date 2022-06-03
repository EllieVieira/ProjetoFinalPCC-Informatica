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
        $cmd = $this->pdo->query( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.idiomas_id, discursao.data, discursao.imagem, usuarios.nome, idiomas.nome as nomei FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id 

    INNER JOIN idiomas ON idiomas.id = discursao.idiomas_id where discursao.idiomas_id ORDER BY discursao.id DESC" );
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
    }

    public function buscarDadosDisc() {
        $cmd = $this->pdo->prepare( "SELECT discursao.id, discursao.titulo, discursao.descricao, discursao.data, discursao.imagem, usuarios.nome FROM lancult_bd.discursao INNER JOIN usuarios ON usuarios.id = discursao.usuarios_id ORDER BY discursao.id DESC" );
        $cmd->execute();
        $ant = $cmd->fetchAll( PDO::FETCH_LAZY );
        return $ant;
    }

    public function buscarDadosPerfil() {
        $res = array();
        $cmd = $this->pdo->query("SELECT usuarios.id, usuarios.paises_id, usuarios.tipo_id, paises.nome, tipo.nome as nomet FROM lancult_bd.usuarios 
        INNER JOIN paises ON paises.id = usuarios.paises_id 
        INNER JOIN tipo ON tipo.id = usuarios.tipo_id where usuarios.paises_id and usuarios.tipo_id");
        $res = $cmd->fetchAll( PDO::FETCH_ASSOC );
        return $res;
}

    // public function buscarDadosR(){
    // $res = array();
    // $cmd = $this->pdo->query ("SELECT respostas.id, respostas.descricao, respostas.data, respostas.usuarios_id, usuarios.nome FROM respostas inner join usuarios on respostas.id = usuarios.id;. ")
    // }
}