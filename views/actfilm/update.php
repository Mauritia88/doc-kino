<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Actfilm $model */

$this->title = 'Update Actfilm: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Actfilms', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actfilm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
