<?php

namespace backend\controllers;

use yii\web\Controller;

/**
 * Controller must extend yii/web/Controller *
 * Controller has its own id ~ /hello
 */
class HelloController extends Controller // hello
{
    // render view in return statement, should be same name with action id
    // views of a controller are defined in dir /backend/views, should be in folder with same id with controller
    public function actionMyIndex() // my-index
    {
        return $this->render('index');
    }

}