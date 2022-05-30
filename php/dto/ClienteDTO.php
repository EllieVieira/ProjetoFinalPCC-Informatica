<?php

class ClienteDTO
{
    private $id;
    private $nome;
    private $email;
    private $password;
    private $data_cadastramento;
    private $paises_id;
    private $tipo_id;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function setpassword($password)
    {
        $this->password = $password;
    }

    public function getData_Cadastramento()
    {
        return $this->data_cadastramento;
    }
    public function setData_Cadastramento($data_cadastramento)
    {
        $this->data_cadastramento = $data_cadastramento;

        return $this;
    }

    public function getPaises_id()
    {
        return $this->paises_id;
    }

    public function setPaises_id($paises_id)
    {
        $this->paises_id = $paises_id;

        return $this;
    }

    public function getTipo_id()
    {
        return $this->tipo_id;
    }

    public function setTipo_id($tipo_id)
    {
        $this->tipo_id = $tipo_id;

        return $this;
    }
}
