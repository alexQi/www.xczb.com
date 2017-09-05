<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ActivityBase */

$this->title = 'Create Activity Base';
$this->params['breadcrumbs'][] = ['label' => 'Activity Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
