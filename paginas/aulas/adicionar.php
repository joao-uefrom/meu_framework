<?php require_once ABSPATH . 'templates/body.php' ?>
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title"> Adicionar Aula </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="/aulas/listar" class="btn btn-primary d-none d-sm-inline-block">
                    Listar
                </a>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card card-body">
                    <form action="/aulas/adicionar" method="post">
                        <div class="form-group mb-3 ">
                            <label class="form-label">Aula</label>
                            <input type="text" name="aula" class="form-control">
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Professor</label>
                            <input type="text" name="professor" class="form-control">
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Dia da Semana</label>
                            <input type="text" name="dia" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once ABSPATH . 'templates/footer.php' ?>
