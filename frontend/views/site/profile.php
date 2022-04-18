<?php

/** @var yii\web\View $this */
/* @var $model common\models\User */
use yii\helpers\Html;

$this->title = 'Мой профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    Добро пожаловать
    <p><b><?=$model->username ?></b></p>
    Твой Api Token, для его изменения покормите разработчика
    <p> <b><?=$model->auth_key ?></b> </p>
    Можно через ссылку:
    <p><?=Html::a("back/pepyakas?access-token={$model->auth_key}","http://back/pepyakas?access-token={$model->auth_key}")?></p>
    Либо HTTP Bearer Tokens:
    <p>curl -i -H -head "Accept:application/json" -H "Authorization: Bearer <?=$model->auth_key ?>" "http://back/pepyakas"</p>

</div>
