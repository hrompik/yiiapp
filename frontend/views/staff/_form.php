<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $staff frontend\models\Staff */
/* @var $user common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-update-form">

    <?php $form = ActiveForm::begin([
        'id' => 'user-update-form',
        'options' => ['class' => 'form-horizontal'],
    ]) ?>

    <?= $form->field($staff, 'user_id')->textInput() ?>

    <?= $form->field($staff, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($staff, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($staff, 'fathername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($staff, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($staff, 'inner_phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($staff, 'mobile_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
