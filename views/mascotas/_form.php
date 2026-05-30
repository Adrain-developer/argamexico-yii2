<?php
use app\models\Mascotas;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mascotas */
/* @var $imagenes array<string,array{label:string,posicion:string,url:string}> */

$max = Mascotas::MENSAJE_MAX;
?>

<?php $form = ActiveForm::begin(['id' => 'mascota-form']); ?>

<div class="row g-4">
  <div class="col-12">
    <label class="form-label fw-semibold">Elige la mascota</label>
    <p class="text-muted small mb-2">La posición (izquierda / derecha / centro) se asigna automáticamente según la imagen.</p>

    <?php if (empty($imagenes)): ?>
      <div class="alert alert-warning">No se encontraron imágenes en <code>/images/mascota/</code>.</div>
    <?php else: ?>
      <div class="mascota-picker">
        <?php foreach ($imagenes as $file => $info): ?>
          <label class="mascota-option <?= $model->imagen === $file ? 'is-selected' : '' ?>">
            <input type="radio" name="Mascotas[imagen]" value="<?= Html::encode($file) ?>"
                   <?= $model->imagen === $file ? 'checked' : '' ?>>
            <img src="<?= Html::encode($info['url']) ?>" alt="<?= Html::encode($info['label']) ?>" loading="lazy">
            <span class="mascota-pos badge bg-light text-dark"><?= Html::encode($info['posicion']) ?></span>
          </label>
        <?php endforeach; ?>
      </div>
      <?= Html::error($model, 'imagen', ['class' => 'text-danger small mt-1']) ?>
    <?php endif; ?>
  </div>

  <div class="col-12">
    <?= $form->field($model, 'mensaje')->textarea([
        'maxlength'  => $max,
        'rows'       => 2,
        'id'         => 'mascota-mensaje',
        'placeholder'=> 'Ej: ¿En tu empresa hay trabajo en bipedestación?',
    ])->hint('<span id="mensaje-counter">0</span>/' . $max . ' caracteres. Entre menos texto, más grande se verá en pantalla.') ?>
  </div>

  <div class="col-md-4">
    <?= $form->field($model, 'orden')->textInput(['type' => 'number', 'min' => 0])
        ->hint('0 = al final automáticamente.') ?>
  </div>
  <div class="col-md-4 d-flex align-items-center pt-3">
    <?= $form->field($model, 'activo')->checkbox() ?>
  </div>

  <div class="col-12">
    <div class="accordion" id="waAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#waCollapse" aria-expanded="false" aria-controls="waCollapse">
            <i class="fab fa-whatsapp me-2 text-success"></i> Número de WhatsApp (opcional)
          </button>
        </h2>
        <div id="waCollapse" class="accordion-collapse collapse <?= $model->wa_numero ? 'show' : '' ?>"
             data-bs-parent="#waAccordion">
          <div class="accordion-body">
            <?= $form->field($model, 'wa_numero')->textInput([
                'placeholder' => '+52 ' . substr(Mascotas::WA_DEFAULT, 2),
            ])->hint('Si lo dejas vacío, se usa el número por defecto: +52 ' . substr(Mascotas::WA_DEFAULT, 2) . '.') ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 d-flex gap-2">
    <?= Html::submitButton('<i class="fas fa-save me-1"></i> Guardar', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
  </div>
</div>

<?php ActiveForm::end(); ?>

<?php
$js = <<<JS
(function () {
  var picker = document.querySelector('.mascota-picker');
  if (picker) {
    picker.addEventListener('change', function (e) {
      if (e.target.name !== 'Mascotas[imagen]') return;
      picker.querySelectorAll('.mascota-option').forEach(function (o) { o.classList.remove('is-selected'); });
      e.target.closest('.mascota-option').classList.add('is-selected');
    });
  }
  var ta = document.getElementById('mascota-mensaje');
  var counter = document.getElementById('mensaje-counter');
  if (ta && counter) {
    var sync = function () { counter.textContent = ta.value.length; };
    ta.addEventListener('input', sync);
    sync();
  }
})();
JS;
$this->registerJs($js, \yii\web\View::POS_END);
?>
