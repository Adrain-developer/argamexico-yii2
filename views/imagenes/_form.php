<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Imagenes */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    h4 {
        color: brown;
    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 42px;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 2.25rem;
        padding-top: 15px;
        top: 10px;
        padding-bottom: 10px;
        bottom: 50px;
        border-top-width: medium;
        padding-left: 20px;
        margin: 15px;
    }
</style>

<div class="container imagenes-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class=" card">
        <h4 class="row col-md-6"> Sección Banner Arga Fire</h4>
        <div class="row col-md-12">
            <br>
            <div class="col-md-4">
                <?= $form->field($model, 'tituloIdxFire')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'subtIdxFire')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'textoIdxFire')->textarea(['rows' => 6]) ?> 
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <?= $form->field($model, 'pathImagenIdxFire')->fileInput(['accept' => 'image/*'])->label("Tamaño recomendado: 1920 x 830 px") ?>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <?php
                        if (!empty($model->pathImagenIdxFire) && !is_null($model->pathImagenIdxFire)) { ?>
                            <input type="hidden" name="Imagenes[pathImagenIdxFireActual]" value="<?= $model->pathImagenIdxFire ?>">
                            <?= !empty($model->pathImagenIdxFire) && !is_null($model->pathImagenIdxFire) ? "Imagen actual: " : '' ?>
                            <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxFire ?>" class="lock-profile-img" width="180" height="100">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" card">
        <h4 class="row col-md-6"> Sección Banner Arga Consultores</h4>
        <div class="row col-md-12">
            <div class="col-md-4">
                <?= $form->field($model, 'tituloIdxCons')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'subtIdxCons')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'textoIdxCons')->textarea(['rows' => 6]) ?> 
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <?= $form->field($model, 'pathImagenIdxCons')->fileInput(['accept' => 'image/*'])->label("Tamaño recomendado: 1920 x 830 px") ?>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <?php
                        if (!empty($model->pathImagenIdxCons) && !is_null($model->pathImagenIdxCons)) { ?>
                            <input type="hidden" name="Imagenes[pathImagenIdxConsActual]" value="<?= $model->pathImagenIdxCons ?>">
                            <?= !empty($model->pathImagenIdxCons) && !is_null($model->pathImagenIdxCons) ? "Imagen actual: " : '' ?>
                            <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxCons ?>" class="lock-profile-img" width="180" height="100">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" card">
        <h4 class="row col-md-6"> Sección Banner Arga Labs</h4>
        <div class="row col-md-12">
            <div class="col-md-4">
                <?= $form->field($model, 'tituloIdxlabs')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'subtIdxlabs')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'textoIdxlabs')->textarea(['rows' => 6]) ?> 
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <?= $form->field($model, 'pathImagenIdxlabs')->fileInput(['accept' => 'image/*'])->label("Tamaño recomendado: 1920 x 830 px") ?>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <?php
                        if (!empty($model->pathImagenIdxlabs) && !is_null($model->pathImagenIdxlabs)) { ?>
                            <input type="hidden" name="Imagenes[pathImagenIdxlabsActual]" value="<?= $model->pathImagenIdxlabs ?>">
                            <?= !empty($model->pathImagenIdxlabs) && !is_null($model->pathImagenIdxlabs) ? "Imagen actual: " : '' ?>
                            <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxlabs ?>" class="lock-profile-img" width="180" height="100">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" card">
        <h4 class="row col-md-6"> Sección Banner Arga Training</h4>
        <div class="row col-md-12">
            <div class="col-md-4">
                <?= $form->field($model, 'tituloIdxTr')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'subtIdxTr')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'textoIdxTr')->textarea(['rows' => 6]) ?> 
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <?= $form->field($model, 'pathImagenIdxTr')->fileInput(['accept' => 'image/*'])->label("Tamaño recomendado: 1920 x 830 px") ?>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <?php
                        if (!empty($model->pathImagenIdxTr) && !is_null($model->pathImagenIdxTr)) { ?>
                            <input type="hidden" name="Imagenes[pathImagenIdxTrActual]" value="<?= $model->pathImagenIdxTr ?>">
                            <?= !empty($model->pathImagenIdxTr) && !is_null($model->pathImagenIdxTr) ? "Imagen actual: " : '' ?>
                            <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxTr ?>" class="lock-profile-img" width="180" height="100">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" card">
        <h4 class="row col-md-6">Sección Arga Fire</h4>
        <p>Se aplican los cambios tanto en la vista de inicio como en la vista de ARGA FIRE<br>
            Tamaño recomendado: 390 x 354 px</p>
        <div class="row col-md-12">
            <div class="row col-md-4">
                <div class="">
                    <?= $form->field($model, 'pathImagenIdxFireUno')->fileInput(['accept' => 'image/*'])->label("Imagen para: 'Mantenimiento'") ?>
                </div>
                <div class="">
                    <div class="col-md-4 mx-auto center">
                        <div class="text-center">
                            <?php
                            if (!empty($model->pathImagenIdxFireUno) && !is_null($model->pathImagenIdxFireUno)) { ?>
                                <input type="hidden" name="Imagenes[pathImagenIdxFireUnoActual]" value="<?= $model->pathImagenIdxFireUno ?>">
                                <?= !empty($model->pathImagenIdxFireUno) && !is_null($model->pathImagenIdxFireUno) ? "Imagen actual: " : '' ?>
                                <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxFireUno ?>" class="" width="110" height="110">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row col-md-4">
                <div class="">
                    <?= $form->field($model, 'pathImagenIdxFireDos')->fileInput(['accept' => 'image/*'])->label("Imagen para: 'Acreditación'") ?>
                </div>
                <div class="">
                    <div class="col-md-4 mx-auto center">
                        <div class="text-center">
                            <?php
                            if (!empty($model->pathImagenIdxFireDos) && !is_null($model->pathImagenIdxFireDos)) { ?>
                                <input type="hidden" name="Imagenes[pathImagenIdxFireDosActual]" value="<?= $model->pathImagenIdxFireDos ?>">
                                <?= !empty($model->pathImagenIdxFireDos) && !is_null($model->pathImagenIdxFireDos) ? "Imagen actual: " : '' ?>
                                <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxFireDos ?>" class="" width="110" height="110">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row col-md-4">
                <div class="">
                    <?= $form->field($model, 'pathImagenIdxFireTres')->fileInput(['accept' => 'image/*'])->label("Imagen para: 'Productos'") ?>
                </div>
                <div class="">
                    <div class="col-md-4 mx-auto center">
                        <div class="text-center">
                            <?php
                            if (!empty($model->pathImagenIdxFireTres) && !is_null($model->pathImagenIdxFireTres)) { ?>
                                <input type="hidden" name="Imagenes[pathImagenIdxFireTresActual]" value="<?= $model->pathImagenIdxFireTres ?>">
                                <?= !empty($model->pathImagenIdxFireTres) && !is_null($model->pathImagenIdxFireTres) ? "Imagen actual: " : '' ?>
                                <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxFireTres ?>" class="" width="110" height="110">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" card">
        <h4 class="row col-md-6">Sección Consultores</h4>
        <p>Se aplican los cambios tanto en la vista de inicio como en el banner de ARGA Consultores<br>
            Tamaño recomendado: 1921 x 1070 px</p>
        <div class="row col-md-12">
            <div class="col-md-6">
                <?= $form->field($model, 'tituloBnrIdxCons')->textarea(['rows' => 6]) ?> 
            </div>
            <div class="col-md-6">
                <div>
                    <?= $form->field($model, 'pathImagenBnrIdxCons')->fileInput(['accept' => 'image/*'])->label("Imagen") ?>
                </div>
                <div class="">
                    <div class="col-md-4 mx-auto center">
                        <div class="text-center">
                            <?php
                            if (!empty($model->pathImagenBnrIdxCons) && !is_null($model->pathImagenBnrIdxCons)) { ?>
                                <input type="hidden" name="Imagenes[pathImagenBnrIdxConsActual]" value="<?= $model->pathImagenBnrIdxCons ?>">
                                <?= !empty($model->pathImagenBnrIdxCons) && !is_null($model->pathImagenBnrIdxCons) ? "Imagen actual: " : '' ?>
                                <img src="<?= Yii::$app->homeUrl . $model->pathImagenBnrIdxCons ?>" class="" width="180" height="100">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" card">
        <h4 class="row col-md-6">Sección Labs</h4>
        <p>En esta sección podrás cambiar la imágen de inicio, el banner de la vista de Arga Labs y las imagenes de Higiene y Fuentes fijas</p>
        <div class="row col-md-12">
            <div class="col-md-6">
                <div>
                    <?= $form->field($model, 'pathImagenBnrIdxLabs')->fileInput(['accept' => 'image/*'])->label("Imagen de la vista de inicio: 488 x 633 px") ?>
                </div>
                <div class="">
                    <div class="col-md-6 mx-auto center">
                        <div class="text-center">
                            <?php
                            if (!empty($model->pathImagenBnrIdxLabs) && !is_null($model->pathImagenBnrIdxLabs)) { ?>
                                <input type="hidden" name="Imagenes[pathImagenBnrIdxLabsActual]" value="<?= $model->pathImagenBnrIdxLabs ?>">
                                <?= !empty($model->pathImagenBnrIdxLabs) && !is_null($model->pathImagenBnrIdxLabs) ? "Imagen actual: " : '' ?>
                                <img src="<?= Yii::$app->homeUrl . $model->pathImagenBnrIdxLabs ?>" class="" width="110" height="110">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div>
                    <?= $form->field($model, 'pathImagenBnrLabs')->fileInput(['accept' => 'image/*'])->label("Imagen de la vista de Arga Labs: 1920 x 830 px") ?>
                </div>
                <div class="">
                    <div class="col-md-6 mx-auto center">
                        <div class="text-center">
                            <?php
                            if (!empty($model->pathImagenBnrLabs) && !is_null($model->pathImagenBnrLabs)) { ?>
                                <input type="hidden" name="Imagenes[pathImagenBnrLabsActual]" value="<?= $model->pathImagenBnrLabs ?>">
                                <?= !empty($model->pathImagenBnrLabs) && !is_null($model->pathImagenBnrLabs) ? "Imagen actual: " : '' ?>
                                <img src="<?= Yii::$app->homeUrl . $model->pathImagenBnrLabs ?>" class="" width="180" height="100">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-12">

            <div class="col-md-6">
                <div>
                    <?= $form->field($model, 'pathImagenFijasLabs')->fileInput(['accept' => 'image/*'])->label("Imagen Fuentes Fijas, medidas recomendadas: 370 x 370 px") ?>
                </div>
                <div class="">
                    <div class="col-md-6 mx-auto center">
                        <div class="text-center">
                            <?php
                            if (!empty($model->pathImagenFijasLabs) && !is_null($model->pathImagenFijasLabs)) { ?>
                                <input type="hidden" name="Imagenes[pathImagenFijasLabsActual]" value="<?= $model->pathImagenFijasLabs ?>">
                                <?= !empty($model->pathImagenFijasLabs) && !is_null($model->pathImagenFijasLabs) ? "Imagen actual: " : '' ?>
                                <img src="<?= Yii::$app->homeUrl . $model->pathImagenFijasLabs ?>" class="" width="110" height="110">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <?= $form->field($model, 'pathImagenHigieneLabs')->fileInput(['accept' => 'image/*'])->label("Imagen Higiene Laboral, medidas recomendadas: 370 x 370 px") ?>
                </div>
                <div class="">
                    <div class="col-md-6 mx-auto center">
                        <div class="text-center">
                            <?php
                            if (!empty($model->pathImagenHigieneLabs) && !is_null($model->pathImagenHigieneLabs)) { ?>
                                <input type="hidden" name="Imagenes[pathImagenHigieneLabsActual]" value="<?= $model->pathImagenHigieneLabs ?>">
                                <?= !empty($model->pathImagenHigieneLabs) && !is_null($model->pathImagenHigieneLabs) ? "Imagen actual: " : '' ?>
                                <img src="<?= Yii::$app->homeUrl . $model->pathImagenHigieneLabs ?>" class="" width="110" height="110">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=" card">
    <h4 class="row col-md-6">Sección Training</h4>
    <p>Se aplican los cambios tanto en la vista de inicio como en el banner de ARGA Training<br>
        Tamaño recomendado: 1921 x 1070 px</p>
    <div class="row col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'tituloBnrIdxTraining')->textarea(['rows' => 6]) ?> 
        </div>
        <div class="col-md-6">
            <div>
                <?= $form->field($model, 'pathImagenBnrIdxTraining')->fileInput(['accept' => 'image/*'])->label("Imagen") ?>
            </div>
            <div class="">
                <div class="col-md-4 mx-auto center">
                    <div class="text-center">
                        <?php
                        if (!empty($model->pathImagenBnrIdxTraining) && !is_null($model->pathImagenBnrIdxTraining)) { ?>
                            <input type="hidden" name="Imagenes[pathImagenBnrIdxTrainingActual]" value="<?= $model->pathImagenBnrIdxTraining ?>">
                            <?= !empty($model->pathImagenBnrIdxTraining) && !is_null($model->pathImagenBnrIdxTraining) ? "Imagen actual: " : '' ?>
                            <img src="<?= Yii::$app->homeUrl . $model->pathImagenBnrIdxTraining ?>" class="" width="180" height="100">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=" card">
    <h4 class="row col-md-6">Sección Imagenes de Inicio</h4>
    <div class="row col-md-12">
        <div class="col-md-6">
            <div>
                <?= $form->field($model, 'pathImagenIdxUno')->fileInput(['accept' => 'image/*'])->label("Imagen de inicio sección ARGA GROUP, tamaño recomendado: 350 x 483 px") ?>
            </div>
            <div class="">
                <div class="col-md-6 mx-auto center">
                    <div class="text-center">
                        <?php
                        if (!empty($model->pathImagenIdxUno) && !is_null($model->pathImagenIdxUno)) { ?>
                            <input type="hidden" name="Imagenes[pathImagenIdxUnoActual]" value="<?= $model->pathImagenIdxUno ?>">
                            <?= !empty($model->pathImagenIdxUno) && !is_null($model->pathImagenIdxUno) ? "Imagen actual: " : '' ?>
                            <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxUno ?>" class="" width="100" height="100">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <?= $form->field($model, 'pathImagenIdxDos')->fileInput(['accept' => 'image/*'])->label("Imagen de inicio sección Asesoría y Consultoría, tamaño recomendado: 500 x 500 px") ?>
            </div>
            <div class="">
                <div class="col-md-6 mx-auto center">
                    <div class="text-center">
                        <?php
                        if (!empty($model->pathImagenIdxDos) && !is_null($model->pathImagenIdxDos)) { ?>
                            <input type="hidden" name="Imagenes[pathImagenIdxDosActual]" value="<?= $model->pathImagenIdxDos ?>">
                            <?= !empty($model->pathImagenIdxDos) && !is_null($model->pathImagenIdxDos) ? "Imagen actual: " : '' ?>
                            <img src="<?= Yii::$app->homeUrl . $model->pathImagenIdxDos ?>" class="" width="100" height="100">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=" card">
    <div class=" col-md-12">
        <h4 class="row col-md-6">Imagen Banner Contacto</h4>
        <p>Se aplican los cambios para el banner de Contacto<br>
            Tamaño recomendado: 1921 x 1070 px</p>
        <div class="row col-md-12">
            <div class="col-md-6">
                <?= $form->field($model, 'pathImagenBnrContacto')->fileInput(['accept' => 'image/*'])->label("Imagen") ?>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <?php
                    if (!empty($model->pathImagenBnrContacto) && !is_null($model->pathImagenBnrContacto)) { ?>
                        <input type="hidden" name="Imagenes[pathImagenBnrContactoActual]" value="<?= $model->pathImagenBnrContacto ?>">
                        <?= !empty($model->pathImagenBnrContacto) && !is_null($model->pathImagenBnrContacto) ? "Imagen actual: " : '' ?>
                        <img src="<?= Yii::$app->homeUrl . $model->pathImagenBnrContacto ?>" class="lock-profile-img" width="180" height="100">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>