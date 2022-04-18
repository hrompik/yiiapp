<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pepyaka */

$this->title = 'Изменить Пепяку: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пепяки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="pepyaka-update">

    <h1><?= Html::encode($this->title) ?></h1>


        <?php $form = ActiveForm::begin(); ?>

        <?php
        $role = \Yii::$app->authManager->getRolesByUser(\Yii::$app->user->id);
        if(isset($role['admin'])){
            echo $form->field($model, 'user_id')->textInput();
        }
        ?>


        <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>


</div>
