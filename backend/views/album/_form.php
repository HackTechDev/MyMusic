<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'artist')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'genre')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'theme')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'track')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'catalog')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'barcode')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'frontcoverfile')->fileInput() ?>

    <?= $form->field($model, 'backcoverfile')->fileInput() ?>

    <?= $form->field($model, 'releasedat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
