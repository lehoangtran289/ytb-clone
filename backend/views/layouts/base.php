<?php

/** @var \yii\web\View $this */

/** @var string $content */ // will be set through SiteController.actionIndex() -> render()

use backend\assets\AppAsset;
use common\widgets\Alert;
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
            <meta charset="<?= Yii::$app->charset ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <?php $this->registerCsrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </head>
        <body>
            <?php $this->beginBody() ?>
            <div class="wrap d-flex flex-column h-100">
                <div class="wrap d-flex flex-column h-100">
                    <!-- header-->
                    <?php echo $this->render('_header') ?>

                    <?php echo $content ?>
                </div>
            </div>

            <!--The framework listen to these `events` like endBody() or endPage()-->
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage();
