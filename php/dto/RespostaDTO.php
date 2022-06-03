<?php

class RespostaDTO
{
    private $ID;
    private	$DESCRICAO;	
    private $DATA;
    private $PONTUACAO;
    private $DISCURSAO_ID;
    private $USUARIOS_ID;



    /**
     * Get the value of ID
     */ 
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of ID
     *
     * @return  self
     */ 
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Get the value of DESCRICAO
     */ 
    public function getDESCRICAO()
    {
        return $this->DESCRICAO;
    }

    /**
     * Set the value of DESCRICAO
     *
     * @return  self
     */ 
    public function setDESCRICAO($DESCRICAO)
    {
        $this->DESCRICAO = $DESCRICAO;

        return $this;
    }

    /**
     * Get the value of DATA
     */ 
    public function getDATA()
    {
        return $this->DATA;
    }

    /**
     * Set the value of DATA
     *
     * @return  self
     */ 
    public function setDATA($DATA)
    {
        $this->DATA = $DATA;

        return $this;
    }

    /**
     * Get the value of PONTUACAO
     */ 
    public function getPONTUACAO()
    {
        return $this->PONTUACAO;
    }

    /**
     * Set the value of PONTUACAO
     *
     * @return  self
     */ 
    public function setPONTUACAO($PONTUACAO)
    {
        $this->PONTUACAO = $PONTUACAO;

        return $this;
    }

    /**
     * Get the value of DISCURSAO_ID
     */ 
    public function getDISCURSAO_ID()
    {
        return $this->DISCURSAO_ID;
    }

    /**
     * Set the value of DISCURSAO_ID
     *
     * @return  self
     */ 
    public function setDISCURSAO_ID($DISCURSAO_ID)
    {
        $this->DISCURSAO_ID = $DISCURSAO_ID;

        return $this;
    }

    /**
     * Get the value of USUARIOS_ID
     */ 
    public function getUSUARIOS_ID()
    {
        return $this->USUARIOS_ID;
    }

    /**
     * Set the value of USUARIOS_ID
     *
     * @return  self
     */ 
    public function setUSUARIOS_ID($USUARIOS_ID)
    {
        $this->USUARIOS_ID = $USUARIOS_ID;

        return $this;
    }
}