<?php

class Requisicao
{
    private array $dados;

    public function __get($nome): mixed
    {
        if (isset($this->dados[$nome])) {
            return $this->dados[$nome];
        }
        return null;
    }

    public function __set($nome, $valor)
    {
        $this->dados[$nome] = $valor;
    }

}