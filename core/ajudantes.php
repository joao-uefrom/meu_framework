<?php

require_once ABSPATH . 'core/servicos/AuthServico.php';
require_once ABSPATH . 'core/servicos/RegrasServico.php';
require_once ABSPATH . 'core/classes/Navegador.php';
require_once ABSPATH . 'configuracoes/banco.php';

function auth(): AuthServico
{
    return new AuthServico();
}

function db(): PDO
{
    $db = new PDO(
        $GLOBALS['db']['dsn'],
        $GLOBALS['db']['usuario'],
        $GLOBALS['db']['senha']
    );

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $db;
}

function pagina(string $pagina, array $props = []): Navegador
{
    return (new Navegador())->pagina($pagina, $props);
}

function props(string $prop): mixed
{
    return Navegador::$props[$prop];
}

function redirecionar(string $url, int $codigo = 302): Navegador
{
    return (new Navegador())->redirecionar($url, $codigo);
}

function voltar(): Navegador
{
    return (new Navegador())->voltar();
}

function erro(int $codigo = 404): Navegador
{
    if ($codigo === 404)
        return (new Navegador())->erro_404();

    return (new Navegador())->erro_404();
}

function temPermissao(string $modulo, string $acao): bool
{
    return RegrasServico::temPermissao($modulo, $acao);
}