<?php require_once ABSPATH . 'templates/body.php' ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title"> Aulas </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <?php
                if (temPermissao('aulas', 'criar')) {
                    ?>
                    <a href="/aulas/adicionar" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Adicionar
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table
                                class="table table-vcenter card-table">
                            <thead>
                            <tr>
                                <th>Aula</th>
                                <th>Professor</th>
                                <th>Dia da Semana</th>
                                <th class="w-1"></th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach (props('aulas') as $aula) {
                                echo '<tr>';
                                echo '<td>' . $aula->getAula() . '</td>';
                                echo '<td>' . $aula->getProfessor() . '</td>';
                                echo '<td>' . $aula->getDia() . '</td>';
                                echo '<td><a href="/aulas/editar?id=' . $aula->getID() . '">Editar</a></td>';
                                echo '<td><a href="/aulas/excluir?id=' . $aula->getID() . '">Excluir</a></td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php require_once ABSPATH . 'templates/footer.php' ?>
