<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pepyaka */

$this->title = 'Добавить Пепяку';
$this->params['breadcrumbs'][] = ['label' => 'Пепяки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pepyaka-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
    <?= $form->field($model, 'info')->textInput(['autofocus' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
