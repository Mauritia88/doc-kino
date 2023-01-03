<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Actfilm $model */

$this->title = 'Create Actfilm';
$this->params['breadcrumbs'][] = ['label' => 'Actfilms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actfilm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
