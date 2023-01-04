<?php

use app\models\Actfilm;
use app\modules\movie\models\Actors;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Соответствие фильм актер';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actfilm-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Actfilm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'Актер',
                'value' => function ($data) {
                    return Actors::findOne(['id_actor' => $data->id_a])->lastName;}
            ],
            [
                'attribute' => 'Фильм',
                'value' => function ($data) {
                    return \app\models\Film::findOne(['id_film' => $data->id_f])->title;}
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>


</div>
