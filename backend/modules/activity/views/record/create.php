<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ApplyRecord */

$this->title = 'Create Apply Record';
$this->params['breadcrumbs'][] = ['label' => 'Apply Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apply-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
