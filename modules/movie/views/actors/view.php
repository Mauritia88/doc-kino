<?php


use app\modules\movie\models\Actors;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\movie\models\Actors $model */

$this->title = $model->lastName.' '.$model->firstName;
$this->params['breadcrumbs'][] = ['label' => 'Актёры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="actors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo \yii\helpers\Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-outline-secondary']); ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_actor',
            'firstName',
            'middleName',
            'lastName',
            'birthdaydate',
            [
                'attribute' => 'Фильмы',
                'value' => function (Actors $data) {
                    return implode(', ', array_map(function ($array) {
                        return $array['title'];
                    }, $data->getActfilms1()->asArray()->all()));
                },

            ],
        ],
    ]) ?>

</div>
