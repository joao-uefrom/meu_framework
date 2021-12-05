<?php


class AuthGuarda
{

    public string $destino = '/auth/entrar';

    public function executar(Requisicao $requisicao): bool
    {
        return auth()->autenticado();
    }

}