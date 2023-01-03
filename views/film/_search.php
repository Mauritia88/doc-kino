<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FilmSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="film-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row justify-content-end">
        <div class="col-6">
            <?= $form->field($model, 'title')->textInput(['placeholder' => "Название"])->label(false) ?>
            <?= $form->field($model, 'year')->textInput(['placeholder' => "Год"])->label(false) ?>
            <?= $form->field($model, 'id_cat')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id_category', 'name'),
                ['prompt' => 'Категория'])->label(false) ?>
        </div>
        <div class="text-center">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Очистить', ['onclick' => 'window.location.replace(window.location.pathname);',
                'class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
