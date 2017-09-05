<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplyRecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apply-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'apply_name') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'self_desc') ?>

    <?php // echo $form->field($model, 'self_picture') ?>

    <?php // echo $form->field($model, 'self_media') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
