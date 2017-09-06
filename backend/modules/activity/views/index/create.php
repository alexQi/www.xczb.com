<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ActivityBase */

$this->title = 'Create Activity Base';
$this->params['breadcrumbs'][] = ['label' => 'Activity Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
