<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $staff frontend\models\Staff */
/* @var $user common\models\User */

$this->title = 'Редактировать сотрудника: ' . $staff->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Администратирование', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['/admin/staff']];
$this->params['breadcrumbs'][] = ['label' => $staff->user_id, 'url' => ['view', 'user_id' => $staff->user_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="staff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'user' => $user,
        'staff' => $staff,
    ]) ?>

</div>
