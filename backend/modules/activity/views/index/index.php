<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\activityBaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activity Bases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-base-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Activity Base', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tilte',
            'activity_desc',
            'activity_rules',
            'start_time:datetime',
            // 'end_time:datetime',
            // 'status',
            // 'is_delete',
            // 'user_id',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
