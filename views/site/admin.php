<?php use yii\helpers\Url;
?>
<div class="admin-panel container">
    <h3>Panel de administración</h3>
    <div class="row marginbottom50">
        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Módulo de productos</h5>
                    <p class="card-text">Aquí podrás cargar tus nuevos productos, editar los existentes o dar de baja los que ya no necesites.</p>
                    <a href="<?= Url::toRoute('/productos') ?>" class="btn btn-primary">Ir a productos</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Módulo de cursos</h5>
                    <p class="card-text">Esta sección te permitirá publicar o editar los detalles de tus cursos.</p>
                    <a href="<?= Url::toRoute('eventos/index') ?>" class="btn btn-primary">Ir a cursos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row marginbottom50">
        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Administración de <strong>LABS</strong></h5>
                    <p class="card-text">Aquí podrás administrar la información referente a <strong>ARGA LABS</strong>.</p>
                    <a href="<?= Url::toRoute(['/publicaciones', 'tipo' => 'labs']) ?>" class="btn btn-primary">Ir a LABS</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Administración de consultores</h5>
                    <p class="card-text">Esta sección te permitirá publicar, editar o eliminar los detalles de la sección de <strong>Consultores</strong>.</p>
                    <a href="<?= Url::toRoute(['/publicaciones', 'tipo' => 'consultores']) ?>" class="btn btn-primary">Ir a consultores</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row marginbottom50">
        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Administración de <strong>DS3</strong></h5>
                    <p class="card-text">Aquí podrás administrar los folios <strong>DS3</strong> y sus respectivas empresas.</p>
                    <a href="<?= Url::toRoute('/productos') ?>" class="btn btn-primary">Ir a DS3</a>
                </div>
            </div>
        </div>
    </div>
</div>