<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pepyaka */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пепяки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pepyaka-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить пепяку?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    $widget = [
        'model' => $model,
        'attributes' => [
            'id',
            'info',
        ],
    ];
    $role = Yii::$app->authManager->getRolesByUser(\Yii::$app->user->id);
    if(isset($role['admin'])){
        $widget['attributes'][] = 'user_id';
        $widget['attributes'][] = 'user.username';
    }
    ?>
    <?= DetailView::widget($widget) ?>

</div>
