<?php

use app\models\Film;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Category;

/** @var yii\web\View $this */
/** @var app\models\FilmSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Фильмы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="film-index">


    <h1 class="text-center text-uppercase" style="color: #0d314b"><?= Html::encode($this->title) ?></h1>


    <div class="form-group row">
        <div class="col-3">
            <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
            <?php echo \yii\helpers\Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-outline-secondary']); ?>
        </div>
        <div class="col-lg-9">
            <?php echo isset($searchModel) ? $this->render('_search', ['model' => $searchModel]) : ""; ?>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-striped'
        ],
        'layout'=>"{pager}\n{summary}\n{items}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title',
                'value' => function($model, $key) {
                    $result = '';
                    $result .= "<b>Название:</b><br>".$model->title.";<br>";
                    $result .= "<b>Год:</b><br>".$model->year.";<br>";
                    $result .= "<b>Возр. огран.:</b><br>".$model->age_limit.";<br> ";
                    $result .= "<b>Длительность:</b><br>".$model->duration."; ";
                    return $result;
                },
                'format' => 'html',
            ],
                'producer',
            [
                'attribute' => 'Постер',
                'value' => function($model) { return $model->getImage();},
                'format' => ['image',['style'=>'width:250px;','class'=>"align-content-center"]],
            ],
            'video',
            'description:ntext',
            [
                'attribute' => 'Категория',
                'value' => function ($data) {
                                return Category::findOne(['id_category' => $data->id_cat])->name;}
            ],

//            ['class' => 'yii\grid\ActionColumn',
//                'header'=>'Действия',
//                'template' => '{view}'],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Film $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_film' => $model->id_film]);
                 }
            ],
        ],
    ]); ?>


</div>
