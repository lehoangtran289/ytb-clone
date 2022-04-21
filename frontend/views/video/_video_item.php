<?php

/**
 * @var $model \common\models\Video
 */

use yii\helpers\Url as Url;

?>

<!-- Each Item from ListView in index.php -->

<div class="card m-3" style="width: 18rem;">
    <a href="<?php echo Url::to(['/video/view', 'video_id' => $model->video_id]) ?>">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item"
                   src="<?php echo $model->getVideoLink() ?>"
                   poster="<?php echo $model->getThumbnailLink() ?>"
            >
            </video>
        </div>
    </a>
    <div class="card-body p-2">
        <h6 class="card-title m-1 font-weight-bold"><?php echo $model->title ?></h6>
        <p class="card-text text-muted m-1">
            <?php echo \common\helpers\Html::channelLink($model->createdBy) ?>
        </p>
        <p class="card-text text-muted m-0">
            <?php echo $model->getViews()->count() ?>
            views .
            <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
        </p>
    </div>
</div>