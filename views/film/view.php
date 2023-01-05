<?php


use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\models\Category;


/** @var yii\web\View $this */
/** @var app\models\Film $model */

$this->title = $model->title;

\yii\web\YiiAsset::register($this);
?>
<div class="container-main">
    <h1 class="title">Сайт о документальном кино</h1>
    <hr>
</div>

<div class="film-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo \yii\helpers\Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-outline-secondary']); ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-4">
                <img src="<?= $model->getImage(); ?>" alt="<?= $model->title ?>" class="img-fluid">
            </div>
            <div class="row col-8">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'id_film',
                        //'title',
                        'year',
                        'duration',
                        'age_limit',
                        'producer',
//            [
//                'attribute' => 'Постер',
//                'value' => function($data) {
//                        return Html::img($data->getImage(), ['width'=>200]);},
//                'format' => 'html',
//            ],
                        //'video',
//            [
//                    'attribute' => 'Видео',
//                    'value' => function($data){
//                    <iframe width="420" height="315" src="http://www.youtube.com/embed/KmIzf9wDuZs?rel=0" frameborder="0" allowfullscreen></iframe>
//                    },
//                'format'=>"html",
//            ],
                        'description',
                        //'id_cat',
                        ['label' => 'Категория',
                            'value' => function ($data) {
                                return Category::findOne(['id_category' => $data->id_cat])->name;
                            }
                        ],
                    ],
                ]) ?>
            </div>
        </div>
        <!--        --><? //= Html::label("Актерский состав:") ?>
        <?= GridView::widget([
            'dataProvider' => $movieDataProvider,
            'summary' => false,
            'columns' => [

                [
                    'attribute' => 'Актерский состав:',
                    'value' => function ($model, $key) {
                        $result = '';
                        $result .= $model->firstName . ' ';
                        $result .= Html::a($model->lastName, ['movie/actors/view', 'id_actor' => $model->id_actor], ['class' => 'profile-link text-decoration-none text-reset']);
                        return $result;
                    },
                    'format' => 'html',
                ],

            ],
        ]);
        ?>



        <div class="row">
<!--            <iframe width="100%" height="1000" src="--><?//= $model->video ?><!--" frameborder="0" allowfullscreen></iframe>-->
            <?= Html::a('Для просмотра фильма перейдите по ссылке', Url:: to($model->video), ['class' => 'profile-link', 'target'=>'_blank']) ?>
        </div>

        <?= $this->render('/comment/comment', [
            'model'=>$model,
            'comments'=>$comments,
            'commentForm'=>$commentForm,
        ])
        ?>
    </div>


</div>
