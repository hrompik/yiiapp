<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;



class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $exception = Yii::$app->errorHandler->exception;
        return $this->render('error404', ['exception' => $exception]);
    }


}
