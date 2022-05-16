<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Staff */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Администратирование', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['/admin/staff']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'firstname',
            'lastname',
            'fathername',
            'avatar',
            'inner_phone_number',
            'mobile_phone',
            'user.username',
        ],
    ]) ?>

</div>
