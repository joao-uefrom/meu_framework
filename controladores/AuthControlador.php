<?php

class AuthControlador
{

    public function index(): Navegador
    {
        return pagina('auth/entrar');
    }

    public function autenticar(Requisicao $requisicao): Navegador
    {
        if (auth()->autenticar($requisicao->usuario, $requisicao->senha))
            return redirecionar('/aulas');

        return voltar();
    }

    public function sair(): Navegador
    {
        auth()->sair();
        return redirecionar('/auth/entrar');
    }
    
}