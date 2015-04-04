<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AlbumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'artist') ?>

    <?= $form->field($model, 'genre') ?>

    <?= $form->field($model, 'theme') ?>

    <?php // echo $form->field($model, 'track') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'catalog') ?>

    <?php // echo $form->field($model, 'barcode') ?>

    <?php // echo $form->field($model, 'frontcover') ?>

    <?php // echo $form->field($model, 'backcover') ?>

    <?php // echo $form->field($model, 'releasedat') ?>

    <?php // echo $form->field($model, 'createdat') ?>

    <?php // echo $form->field($model, 'updatedat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
