<?php


use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\FilmSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Расширенный поиск';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="film-index_list">


    <h1 class="text-center text-uppercase" style="color: #0d314b"><?= Html::encode($this->title) ?></h1>

    <?php echo isset($searchModel) ? $this->render('fsearch', ['model' => $searchModel]) : ""; ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'summary' => 'Показано {count} из {totalCount}',
        'summaryOptions' => [
            'tag' => 'span',
            'class' => 'my-summary'
        ],

        'emptyText' => '<p>Список пуст</p>',
        'emptyTextOptions' => [
            'tag' => 'p'
        ],

        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item', ['model' => $model]);

            // or just do some echo
            // return $model->title . ' posted by ' . $model->author;
        },
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'nextPageLabel' => 'next',
            'prevPageLabel' => 'previous',
            'maxButtonCount' => 3,
        ],
    ]); ?>


</div>
