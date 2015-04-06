<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albums';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Album', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'label' => 'Cover',
                'format'=>'raw',
                'value' => function($data){
                    return "<a href='/mymusic/backend/web/index.php?r=album/view&id=" . $data->id . "'><img src='/mymusic/backend/web/" . $data->frontcover . "' style='width:100px'></a>";
                },
            ],


            [
                'attribute' => 'title',
                'format'=>'raw',
                'value' => function($data){
                    $url = "/mymusic/backend/web/index.php?r=album/view&id=" . $data->id;
                    return Html::a($data->title, $url, ['title' => $data->title]); 
                },
            ],
 
            'artist',
            //'genre',
            //'theme',
            // 'track',
            // 'duration',
            // 'catalog',
            // 'barcode',
            // 'frontcover',
            // 'backcover',
            // 'releasedat',
            // 'createdat',
            // 'updatedat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
