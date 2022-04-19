<?php

/** @var \yii\web\View $this */

/** @var string $content */ // will be set through SiteController.actionIndex() -> render()

use common\widgets\Alert;

// inject everything into $content in base.php
$this->beginContent('@frontend/views/layouts/base.php')
?>

<main class="d-flex">
    <div class="content-wrapper p-3">
        <?= Alert::widget() ?>
        <?= $content // index.php     ?>
    </div>
</main>

<?php $this->endContent() ?>

