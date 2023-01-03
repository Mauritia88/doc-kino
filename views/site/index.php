<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Мир кино';
?>

<div class="container-main">

    <h1 class="text-center text-uppercase" style="color: #0d314b">Сайт о документальном кино</h1>
    <br>
    <div class="form-group row search-div justify-content-center">
        <form class="col-8" method="get" action="<?=Url:: to(['/film/index-search']) ?>">
            <input type="text" class="form-control" name="sh-search" placeholder="Поиск">
        </form>
        <div class="col-2">
            <?= Html::a('Расширенный поиск', ['/film/index_list'], ['class' => 'profile-link']) ?>
        </div>
    </div>
    <p class="text-1" style="margin-top: 60px;">Общая информация:</p>
    <p class="text-dark text-justify">На сайте представлены документальные фильмы по категориям.</p>
    <hr>
    <div class="main-content">
        <h1 class="film-title">Последние добавленные фильмы</h1>
        <div class="films">
            <!-- !!!!! -->

            <?php foreach ($films as $film): ?>
                <div class="film">
                    <img src="<?= $film->getImage(); ?>" alt="Постер" width="300px" height="200px">
                    <br>
                    <p class="film-link">
                        <?= Html::a($film->title, ['film/view', 'id_film' => $film->id_film], ['class' => 'profile-link']) ?>
                    </p>
                    <p class="score"><?= $film->year ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
