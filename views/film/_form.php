<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ImageUpload;
use app\models\Category;

/** @var yii\web\View $this */
/** @var app\models\Film $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="film-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => "Название"]); ?>

    <?= $form->field($model, 'year')->textInput(['placeholder' => "Год"]) ?>

    <?= $form->field($model, 'duration')->textInput(['maxlength' => true, 'placeholder' => "Длительность"]) ?>

    <?= $form->field($model, 'age_limit')->textInput(['maxlength' => true, 'placeholder' => "Возрастные ограничения"]) ?>

    <?= $form->field($model, 'producer')->textInput(['maxlength' => true, 'placeholder' => "Продюсер"]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => '6', 'maxlength' => true, 'placeholder' => "Описание"]) ?>


<!--    --><?//= $authors = Category::find()->all();
//
//    $items = ArrayHelper::map($authors,'id_category','name');
//    $params = [
//    'prompt' => 'Укажите категорию',
//    ];?>

    <?= $form->field($model, 'id_cat')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id_category', 'name'),
        ['prompt' => 'Укажите категорию'])->label(false);  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
