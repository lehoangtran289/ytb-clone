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

// inject everything into $content in base.php
$this->beginContent('@backend/views/layouts/base.php')
?>

<main class="d-flex">
    <div class="content-wrapper p-3">
        <?= Alert::widget() ?>
        <?= $content // index.php     ?>
    </div>
</main>

<?php $this->endContent() ?>

