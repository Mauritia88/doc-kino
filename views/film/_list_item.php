<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<article class="item" data-key="<?= $model->id_film; ?>">
    <h2 class="text-justify">
        <?= Html::a(Html::encode($model->title), Url::toRoute(['film/view', 'id_film' => $model->id_film]), ['title' => $model->title]) ?>
    </h2>

<!--    <div class="item-excerpt">-->
<!--        --><?//= Html::encode($model->excerpt); ?>
<!--    </div>-->
</article>