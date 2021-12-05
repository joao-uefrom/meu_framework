<?php

class UsuarioModelo
{
    private int $id;
    private string $usuario;
    private string $nome;

    function __construct(int $id, string $usuario, string $nome)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->nome = $nome;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

}