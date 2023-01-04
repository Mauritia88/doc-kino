<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Введите данные для регистрации:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'family')->textInput(['maxlength' => true, 'placeholder' => "Фамилия", 'class'=>'text-capitalize form-control']); ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => "Имя", 'class'=>'text-capitalize form-control']); ?>
            <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true, 'placeholder' => "Отчество", 'class'=>'text-capitalize form-control']); ?>


            <div class="form-group">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>