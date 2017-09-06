<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ApplyRecord */

$this->title = 'Update Apply Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apply Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
