<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CategorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row justify-content-md-end">
        <div class="col-4">
            <?= $form->field($model, 'name')->textInput(['placeholder' => "Название"])->label(false) ?>
        </div>
        <div class="form-group text-center">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Очистить', ['onclick' => 'window.location.replace(window.location.pathname);', 'class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
