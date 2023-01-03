<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1 class="text-center text-uppercase" style="color: #0d314b"><?= Html::encode($this->title) ?></h1>


    <div class="form-group row">
        <div class="col-3">
            <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
            <?php echo \yii\helpers\Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-outline-secondary']); ?>
        </div>
        <div class="col-lg-9">
            <?php echo isset($searchModel) ? $this->render('_search', ['model' => $searchModel]) : ""; ?>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'categoryCount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_category' => $model->id_category]);
                }
            ],
        ],
    ]); ?>
    <div class="justify-content-center">
        <?= Html::a('Посмотреть', ['index-count'], ['class' => 'btn btn-success']) ?>
    </div>

</div>
