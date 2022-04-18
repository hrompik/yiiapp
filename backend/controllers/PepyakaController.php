<?php

namespace backend\controllers;
use common\models\Pepyaka;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;

class PepyakaController extends Controller
{
    public $modelClass = 'backend\models\Pepyaka';

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBearerAuth::class,
                QueryParamAuth::class,
            ],
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        $role = \Yii::$app->authManager->getRolesByUser(\Yii::$app->user->id);
        if(isset($role['admin'])){
            $querry = Pepyaka::find();
        }else{
            $querry = Pepyaka::find()->where(['user_id' => \Yii::$app->user->id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $querry,
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ]
        ]);

        return $dataProvider;
    }
}
