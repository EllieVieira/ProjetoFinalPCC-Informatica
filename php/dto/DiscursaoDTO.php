<?php

class DiscursaoDTO
{
    private $id;
    private $titulo;
    private $descricao;
    private $data;
    private $imagem;
    private $usuarios_id;
    private $idiomas_id;


       /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
     
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of imagem
     */ 
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */ 
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get the value of usuarios_id
     */ 
    public function getUsuarios_id()
    {
        return $this->usuarios_id;
    }

    /**
     * Set the value of usuarios_id
     *
     * @return  self
     */ 
    public function setUsuarios_id($usuarios_id)
    {
        $this->usuarios_id = $usuarios_id;

        return $this;
    }

    /**
     * Get the value of idiomas_id
     */ 
    public function getIdiomas_id()
    {
        return $this->idiomas_id;
    }

    /**
     * Set the value of idiomas_id
     *
     * @return  self
     */ 
    public function setIdiomas_id($idiomas_id)
    {
        $this->idiomas_id = $idiomas_id;

        return $this;
    }

}