<?php
require_once ABSPATH . '/modelos/AulaModelo.php';

class AulasControlador
{

    public function index(): Navegador
    {
        return pagina('aulas/listar', ['aulas' => AulaModelo::listar()]);
    }

    public function formulario(): Navegador
    {
        return pagina('aulas/adicionar');
    }

    public function adicionar(Requisicao $requisicao): Navegador
    {
        $aula = new AulaModelo();
        $aula->setAula($requisicao->aula);
        $aula->setProfessor($requisicao->professor);
        $aula->setDia($requisicao->dia);
        $aula->adicionar();

        return redirecionar('/aulas');
    }

    public function formularioEditar(Requisicao $requisicao): Navegador
    {
        $aula = new AulaModelo(false, $requisicao->id);
        return pagina('aulas/editar', ['aula' => $aula]);
    }

    public function editar(Requisicao $requisicao): Navegador
    {
        $aula = new AulaModelo(false, $requisicao->id);
        $aula->setAula($requisicao->aula);
        $aula->setProfessor($requisicao->professor);
        $aula->setDia($requisicao->dia);
        $aula->atualizar();

        return redirecionar('/aulas');
    }

    public function excluir(Requisicao $requisicao): Navegador
    {
        $id = $requisicao->id;
        $aula = new AulaModelo(false, $id);
        $aula->excluir();

        return redirecionar('/aulas');
    }

}