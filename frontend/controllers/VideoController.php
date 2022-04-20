<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoView;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()->published()->latest()
        ]);
        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView($video_id)
    {
        $this->layout = 'auth';
        $video = Video::findOne($video_id);
        if (!$video) {
            throw new NotFoundHttpException("Video does not exist");
        }

        $videoView = new VideoView();
        $videoView->video_id = $video_id;
        $videoView->user_id = \Yii::$app->user->id;
        $videoView->created_at = time();
        $videoView->save();

        return $this->render('view', [
            'model' => $video
        ]);
    }

}