<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <base href="/">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'Мир Кино',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-brand navbar-expand-lg navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Регистрация', 'url' => ['site/signup'], 'visible' => Yii::$app->user->isGuest],

            Yii::$app->user->can('admin') ? ['label' => 'Добавить', 'items' => [
                ['label' => 'Фильмы', 'url' => ['/film/index']],
                ['label' => 'Категории', 'url' => ['/category/index']],
                ['label' => 'Актеры', 'url' => ['/movie/actors/index']],
                ['label' => 'Соответствие', 'url' => ['/actfilm/index']],
            ]] : '',


            Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>


<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!-- !!!!! -->
<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="text-center">&copy; Документальное кино <?= date('Y') ?> |
            Контакты: <?= Yii::$app->params["contacts"]?> |
            Сотрудничество: <?= Yii::$app->params["cooperation"]?> |
            <?= Html::a('Подписка', '/')?> |
            <?= Html::a('Новый сервис "Мир Музыки"', '/')?>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
