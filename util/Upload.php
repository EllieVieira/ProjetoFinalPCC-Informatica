<?php 
class Upload {

    /**
     * retorna a extensao da imagem
     *
     * @param array $arquivo
     * @return string
     */
    private function getExtensao( array $arquivo ): string {
        $extensao = pathinfo( $arquivo['name'], PATHINFO_EXTENSION );
        $extensao = strtolower( $extensao );
        return $extensao;
    }

    /**
     * extensoes permitidas
     *
     * @param string $extensao
     * @return boolean
     */
    private function Imagem( string $extensao ): bool {
        $extensoes = array( 'gif', 'jpeg', 'jpg', 'png' ); //
        if ( in_array( $extensao, $extensoes ) ) {
            return true;
        }
    }

    public function getNome( array $arquivo ): string {
        $novo_nome = uniqid() . '.' . $this->getExtensao( $arquivo );
        return $novo_nome;
    }

    public function salvar( $arquivo, $pasta ) {
        if ( isset($arquivo) && $arquivo["error"] == 0 ) { 
            $extensao = $this->getExtensao( $arquivo );

            $destino = $pasta . $this->getNome( $arquivo );

            if ( $arquivo['size'] > ( 5 * ( 1024 * 1024 ) ) ) {
                throw new RuntimeException( 'O tamanho do arquivo deve ser no máximo 5 MB.' );
            }

            if ( $this->ehImagem( $extensao ) ) {
                if ( move_uploaded_file( $arquivo['tmp_name'], $destino ) ) {
                    return true;
                } else {
                    throw new RuntimeException( 'Falha ao mover o arquivo enviado. ' . $this->arquivo['error'] );
                }
            } else {
                throw new RuntimeException( 'Não é uma extensão permitida.' );
            }

        }
    }

}