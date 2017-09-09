<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActivityAdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动广告列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

                <div class="box-tools">
        <?= Html::a('添加广告', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'ID',
                'attribute'=>'id',
                "headerOptions" => [
                    "width" => "50"
                ],
            ],
            [
                'label' => '广告名称',
                'attribute'=>'advert_title',
                'format' => 'html',
                'value'=>function ($model) {
                    return Html::a($model->title,$model->link_url);
                },
                "headerOptions" => [
                    "width" => "150"
                ],
            ],
            [
                'label' => '类型',
                'attribute'=>'type',
                'format' => 'html',
                'value'=>function ($model) {
                    $string = $model->type==1 ? '图片' : '视频';
                    $class  = $model->type==1 ? 'danger' : 'success';
                    $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                    return $html;
                },
                'filter' => ['1'=>'图片','2'=>'视频'], //筛选的数据
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '所属活动',
                'attribute'=>'title',
                'format' => 'html',
                'value'=>function ($model) {
                    return Html::a($model->title,['default/view','id'=>$model->id]);
                },
                "headerOptions" => [
                    "width" => "150"
                ],
            ],
            [
                'label' => '状态',
                'attribute'=>'status',
                'format' => 'html',
                'value'=>function ($model) {
                    $string = $model->status==1 ? '禁用' : '启用';
                    $class  = $model->status==1 ? 'danger' : 'success';
                    $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                    return $html;
                },
                'filter' => ['1'=>'禁用','2'=>'启用'], //筛选的数据
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '更新时间',
                'attribute'=>'updated_at',
                'format' => ['date','Y-m-d H:i'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttonOptions' => [
                    'class' => 'btn btn-sm bg-olive margin-r-5'
                ],
                "headerOptions" => [
                    "width" => "100"
                ],
            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>
