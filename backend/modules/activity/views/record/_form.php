<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApplyRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apply-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apply_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'self_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'self_picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'self_media')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
