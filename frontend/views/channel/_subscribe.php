<?php
/**
 * @var $channel \common\models\User
 */

use yii\helpers\Url;

?>

<a class="btn <?php echo $channel->isSubscribed(Yii::$app->user->id) ? 'btn-secondary' : 'btn-danger' ?>"
   href="<?php echo Url::to(['channel/subscribe', 'username' => $channel->username]) ?>"
   role="button"
   data-method="post"
   data-pjax="1"
>
    <?php echo $channel->isSubscribed(Yii::$app->user->id) ? 'Subscribed' : 'Subscribe' ?> <i class="far
    fa-bell"></i>
</a> <?php echo $channel->getSubscribers()->count() ?>
