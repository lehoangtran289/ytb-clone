<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoLike;
use common\models\VideoView;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['like', 'dislike'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verb' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'like' => ['post'],
                    'dislike' => ['post'],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()->published()->latest()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView($video_id)
    {
        $this->layout = 'auth';
        $video = $this->findVideo($video_id);

        $videoView = new VideoView();
        $videoView->video_id = $video_id;
        $videoView->user_id = \Yii::$app->user->id;
        $videoView->created_at = time();
        $videoView->save();

        return $this->render('view', [
            'model' => $video
        ]);
    }

    // trigger by ajax data-pjax="1" -> renderAjax

    /**
     * @throws \yii\db\StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionLike($video_id)
    {
        $video = $this->findVideo($video_id);
        $userId = \Yii::$app->user->id;

        $VideoLikeDislike = VideoLike::find()
            ->userIdVideoId($video_id, $userId)
            ->one();

        if (!$VideoLikeDislike) {
            $this->saveLikeDislike($video_id, $userId, VideoLike::TYPE_LIKE);
        } else if ($VideoLikeDislike->type == VideoLike::TYPE_LIKE) {
            $VideoLikeDislike->delete();
        } else {
            $VideoLikeDislike->delete();
            $this->saveLikeDislike($video_id, $userId, VideoLike::TYPE_LIKE);
        }

        return $this->renderAjax('_button', [ //This method doesn't care about layout
            'model' => $video
        ]);
    }

    public function actionDislike($video_id)
    {
        $video = $this->findVideo($video_id);
        $userId = \Yii::$app->user->id;

        $VideoLikeDislike = VideoLike::find()
            ->userIdVideoId($video_id, $userId)
            ->one();

        if (!$VideoLikeDislike) {
            $this->saveLikeDislike($video_id, $userId, VideoLike::TYPE_DISLIKE);
        } else if ($VideoLikeDislike->type == VideoLike::TYPE_DISLIKE) {
            $VideoLikeDislike->delete();
        } else {
            $VideoLikeDislike->delete();
            $this->saveLikeDislike($video_id, $userId, VideoLike::TYPE_DISLIKE);
        }

        return $this->renderAjax('_button', [ //This method doesn't care about layout
            'model' => $video
        ]);
    }

    protected function saveLikeDislike($video_id, $userId, $type)
    {
        $videoLike = new VideoLike();
        $videoLike->video_id = $video_id;
        $videoLike->user_id = $userId;
        $videoLike->type = $type;
        $videoLike->created_at = time();
        $videoLike->save();
    }

    protected function findVideo($video_id)
    {
        $video = Video::findOne($video_id);
        if (!$video) {
            throw new NotFoundHttpException("Video does not exist");
        }
        return $video;
    }

}