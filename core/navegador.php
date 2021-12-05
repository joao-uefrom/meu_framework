<?php

require_once ABSPATH . 'configuracoes/rotas.php';
require_once ABSPATH . 'core/classes/Requisicao.php';

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
$metodo = $_SERVER['REQUEST_METHOD'];

$requisicao = new Requisicao();

foreach ($_GET as $nome => $valor){
    $requisicao->$nome = $valor;
}

foreach ($_POST as $nome => $valor){
    $requisicao->$nome = $valor;
}

Rota::ir($uri, $metodo, $requisicao);
