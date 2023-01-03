<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Film $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фильмы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id_film' => $model->id_film]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="film-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
