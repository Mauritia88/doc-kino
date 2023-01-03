<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Количество фильмов по категориям';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index-count">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'count',
        ],
    ]); ?>
    <?php echo \yii\helpers\Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-outline-secondary']); ?>
</div>
