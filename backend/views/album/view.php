<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Album */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'artist',
            'genre',
            'theme',
            'track',
            'duration',
            'catalog',
            'barcode',
            'releasedat',
            'createdat',
            'updatedat',
        ],
    ]) ?>

    <?php

        echo "<img src='/mymusic/backend/web/" . $model->frontcover . "' style='width: 200px'>&nbsp;"; 
        echo "<img src='/mymusic/backend/web/" . $model->backcover . "' style='width: 200px'>";
    ?>

</div>
