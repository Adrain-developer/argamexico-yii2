<?php use yii\helpers\Url;
?>
<div class="admin-panel container">
    <h3>Panel de administración</h3>
    <!--<div class="row marginbottom50">
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
                    <a href="<?= Url::toRoute('/empresasfolios') ?>" class="btn btn-primary">Ir a DS3</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Administración de <strong>contenido</strong></h5>
                    <p class="card-text">Esta sección te permitirá editar el contenido de tu plataforma.</p>
                    <a href="<?= Url::toRoute('imagenes/create') ?>" class="btn btn-primary">Ir a contenido</a>
                </div>
            </div>
        </div>

    </div>-->
    <div class="row marginbottom50">
        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Módulo de <strong>Divisiones de Negocio</strong></h5>
                    <p class="card-text">Gestiona las divisiones y sus servicios: descripción, NOMs, imágenes y cursos.</p>
                    <a href="<?= Url::toRoute('/divisiones') ?>" class="btn btn-primary">Ir a Divisiones</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Módulo de <strong>Servicios</strong></h5>
                    <p class="card-text">Administra individualmente cada servicio, sus imágenes y detalles de curso.</p>
                    <a href="<?= Url::toRoute('/servicios') ?>" class="btn btn-primary">Ir a Servicios</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row marginbottom50">
        <div class="col-sm-6">
            <div class="card height185">
                <div class="card-body">
                    <h5 class="card-title">Módulo de <strong>Equipo de Trabajo</strong></h5>
                    <p class="card-text">Administra los miembros del equipo que aparecen en el carrusel del home: nombre, puesto, departamento, división y foto.</p>
                    <a href="<?= Url::toRoute('/equipo') ?>" class="btn btn-primary">Ir a Equipo</a>
                </div>
            </div>
        </div>
    </div>
</div>