<?php
/* @var $this \yii\web\View */
/* @var $channel void */

/**
 * @var $this \yii\web\View
 * @var $channel \common\models\User
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

use yii\helpers\Url as Url;
use yii\widgets\Pjax as Pjax;

?>

<div class="jumbotron">
    <h1 class="display-4"><?php echo $channel->username ?></h1>
    <hr class="my-4">
    <?php Pjax::begin() ?>
    <?php echo $this->render('_subscribe', [
        'channel' => $channel
    ]) ?>
    <?php Pjax::end() ?>
</div>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '@frontend/views/video/_video_item',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>
