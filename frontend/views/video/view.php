<?php

/* @var $this \yii\web\View */

/* @var $model \common\models\Video */

use yii\helpers\Url;
use yii\widgets\Pjax as Pjax;

?>

<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9 mb-3">
            <video class="embed-responsive-item"
                   src="<?php echo $model->getVideoLink() ?>"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   controls>
            </video>
        </div>
        <h5><?php echo $model->title ?></h5>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <?php echo $model->getViews()->count() ?>
                views .
                <?php echo Yii::$app->formatter->asDate($model->created_at) ?>
            </div>
            <div>
                <?php Pjax::begin() ?>

                <?php echo $this->render('_button', [
                        'model' => $model
                ]) ?>

                <?php Pjax::end() ?>
            </div>
        </div>
        <div>
            <p>
                <?php echo \common\helpers\Html::channelLink($model->createdBy) ?>
            </p>
            <?php echo yii\helpers\Html::encode($model->description) ?>
        </div>
    </div>
    <div class="col-sm-4">

    </div>
</div>