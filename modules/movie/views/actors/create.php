<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Actors $model */

$this->title = 'Create Actors';
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
