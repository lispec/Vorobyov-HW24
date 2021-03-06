<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
//        'brandLabel' => 'My Company',
        'brandLabel' => 'My Hello',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
            // поставили светлую минюху вместо темной
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'User', 'url' => ['/user/list']],
//            ['label' => 'User Edit', 'url' => ['/user/edit']],

            // добавили новые лэйблы свои
            ['label' => 'Add School', 'url' => ['/school/add'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Schools', 'url' => ['/school/list'], 'visible' => !Yii::$app->user->isGuest],

            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Foo', 'url' => ['site/foo']],
            ['label' => 'Teacher', 'url' => ['teacher/add']],
            ['label' => 'Student', 'url' => ['student/add']],
            ['label' => 'Register', 'url' => ['site/register']],


            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
                    'Logout (' . Yii::$app->user->identity->email . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
<!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
        <p class="pull-left">&copy; Hello World <?= date('Y') ?></p>



        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
