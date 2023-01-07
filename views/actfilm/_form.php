<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Actfilm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="actfilm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_a')->dropDownList(ArrayHelper::map(\app\modules\movie\models\Actors::find()->all(), 'id_actor', 'lastName'),
        ['prompt' => 'Укажите актера'])->label(false);?>

    <?= $form->field($model, 'id_f')->dropDownList(ArrayHelper::map(\app\models\Film::find()->all(), 'id_film', 'title'),
        ['prompt' => 'Укажите фильм'])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
