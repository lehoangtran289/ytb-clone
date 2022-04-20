<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--    Gridview responsible for rendering data in the table-->
    <!--    $dataProvider handle data of itself like sorting-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'content' => function ($model) {
                    return $this->render('_video_item', ['model' => $model]);
                }
            ],
//            'title',
//            'description:ntext',
//            'tags',
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    return $model->getStatusLabels()[$model->status];
                }
            ],
            //'has_thumbnail',
            //'video_name',
            'created_at:datetime',
            'updated_at:datetime',
//            'created_by',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Video $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'video_id' => $model->video_id]);
//                }
//            ],
            [
                'class' => ActionColumn::class,
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('Delete', ['video/delete', 'video_id' => $model->video_id], [
                            "data" => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ]
        ],
    ]); ?>


</div>
