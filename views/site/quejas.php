
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<style>
    body {
  margin: 20px auto;
}

    </style>
<div class="">
    
  <div class="row">
    <div class="col-sm-12" style="margin-top: 60px">
    <h2>Procedimiento de quejas</h2>
      <div id="galleria" class="galleria row">

        <a href="<?= Yii::$app->homeUrl ?>web/images/acreditaciones/hoja-1.png" class="col-sm-5">
          <img src='<?= Yii::$app->homeUrl ?>web/images/acreditaciones/hoja-1.png' alt="logo" style="" /></a>

          <div class="col-sm-1"></div>

          <a href="<?= Yii::$app->homeUrl ?>web/images/acreditaciones/hoja-2.png" class="col-sm-5">
          <img src='<?= Yii::$app->homeUrl ?>web/images/acreditaciones/hoja-2.png' alt="logo" style="" /></a>
          

          <a href="<?= Yii::$app->homeUrl ?>web/images/acreditaciones/hoja-3.png" class="col-sm-5">
          <img src='<?= Yii::$app->homeUrl ?>web/images/acreditaciones/hoja-3.png' alt="logo" style="" /></a>
          <div class="col-sm-1"></div>

          <a href="<?= Yii::$app->homeUrl ?>web/images/acreditaciones/hoja-4.png" class="col-sm-5">
          <img src='<?= Yii::$app->homeUrl ?>web/images/acreditaciones/hoja-4.png' alt="logo" style="" /></a>

      </div>

    </div>
  </div>
</div>
