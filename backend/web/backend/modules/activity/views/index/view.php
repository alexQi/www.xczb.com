<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityBase */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Activity Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-base-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tilte',
            'activity_desc',
            'activity_rules',
            'start_time:datetime',
            'end_time:datetime',
            'status',
            'is_delete',
            'user_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
