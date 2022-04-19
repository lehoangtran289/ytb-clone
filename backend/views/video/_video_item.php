<?php

/** @var $model \common\models\Video */

use yii\helpers\StringHelper as StringHelperAlias;
use yii\helpers\Url;

?>

<div class="media">
    <a href="<?php echo Url::to(['video/update', 'video_id' => $model->video_id]) ?>">
        <div class="embed-responsive embed-responsive-16by9 mr-3"
             style="width: 200px">
            <video class="embed-responsive-item"
                   src="<?php echo $model->getVideoLink() ?>"
                   poster="<?php echo $model->getThumbnailLink() ?>">
            </video>
        </div>
    </a>
    <div class="media-body">
        <h6 class="mt-0 font-weight-bold"><?php echo $model->title ?></h6>
        <?php echo StringHelperAlias::truncateWords($model->description, 10) ?>
    </div>
</div>