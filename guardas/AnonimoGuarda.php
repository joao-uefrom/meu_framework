<?php


class AnonimoGuarda
{

    public string $destino = '/aulas';

    public function executar(Requisicao $requisicao): bool
    {
        return !auth()->autenticado();
    }

}