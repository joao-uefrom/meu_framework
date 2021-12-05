<?php

require_once ABSPATH . 'core/servicos/RoteadorServico.php';

require_once ABSPATH . 'controladores/AuthControlador.php';
require_once ABSPATH . 'controladores/AulasControlador.php';

require_once ABSPATH . 'guardas/AuthGuarda.php';
require_once ABSPATH . 'guardas/AnonimoGuarda.php';

Rota::redirecionar('/', '/aulas');

Rota::guarda(AnonimoGuarda::class, function () {
    Rota::grupo('/auth', function () {
        Rota::get('entrar', AuthControlador::class, 'index');
        Rota::post('entrar', AuthControlador::class, 'autenticar');
    });
});

Rota::guarda(AuthGuarda::class, function () {
    Rota::get('/sair', AuthControlador::class, 'sair');

    Rota::grupo('/aulas', function () {
        Rota::redirecionar('listar', '/aulas');

        Rota::get('', AulasControlador::class, 'index');

        Rota::get('adicionar', AulasControlador::class, 'formulario');
        Rota::post('adicionar', AulasControlador::class, 'adicionar');

        Rota::get('editar', AulasControlador::class, 'formularioEditar');
        Rota::post('editar', AulasControlador::class, 'editar');

        Rota::get('excluir', AulasControlador::class, 'excluir');
    });
});
