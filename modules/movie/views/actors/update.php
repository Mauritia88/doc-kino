<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Actors $model */

$this->title = 'Update Actors: ' . $model->id_actor;
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_actor, 'url' => ['view', 'id_actor' => $model->id_actor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
