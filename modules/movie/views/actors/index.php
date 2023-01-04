<?php


use app\modules\movie\models\Actors;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ActorsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Актёры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actors-index">

    <h1 class="text-center text-uppercase" style="color: #0d314b"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить актёра', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_actor',
            'firstName',
            'middleName',
            'lastName',
            'birthdaydate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Actors $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_actor' => $model->id_actor]);
                 }
            ],
        ],
    ]); ?>


</div>
