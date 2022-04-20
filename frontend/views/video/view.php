<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Video */
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
                <button class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-thumbs-up"></i> 9K
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-thumbs-down"></i> 123
                </button>
            </div>
        </div>
    </div>
    <div class="col-sm-4">

    </div>
</div>