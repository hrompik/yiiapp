<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Staff */

$this->title = 'Добавить сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Администратирование', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['/admin/staff']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
