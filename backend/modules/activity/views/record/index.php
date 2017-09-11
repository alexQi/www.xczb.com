<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ApplyRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '申请列表';
$this->params['breadcrumbs'][] = $this->title;
Alert::widget();
?>
<?= Alert::widget() ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

                <!-- <div class="box-tools">
        <?= Html::a('Create Apply Record', ['create'], ['class' => 'btn btn-success']) ?>
                </div> -->
            </div>
            <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => '照片',
                'attribute'=>'self_picture',
                'format' => 'html',
                'value'=>function ($model) {
                    $html = '<div class="widget-user-image">
              <img class="img-circle"  style="width: 145px;height: 145px;" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>';
                    return $html;
                },
                "headerOptions" => [
                    "width" => "100"
                ],
            ],
            [
                'label' => '申请人资料',
                'attribute'=>'apply_name',
                'format' => 'html',
                'value'=>function ($model) {
                    $html  = "<dl class='margin'>";
                    $html .= "<dt><i class=\"fa fa-fw fa-plus-square\"></i>：ID <".$model->id."></dt>";
                    $html .= "<dd><i class=\"fa fa-fw fa-h-square\"></i>：".$model->apply_name."</dd>";
                    $html .= "<dd><i class=\"fa fa-fw  fa-odnoklassniki-square\"></i>：".($model->gender==1?'男':'女')."</dd>";
                    $html .= "<dd><i class=\"fa fa-fw fa-phone-square\"></i>：".$model->phone."</dd>";
                    $html .= "<dd><i class=\"fa fa-fw fa-share-square\"></i>：".$model->recommend."</dd>";
                    if($model->status==1)
                    {
                        $status = '<span class="label label-warning">未审核</span>';
                    }elseif($model->status==2){
                        $status = '<span class="label label-info">已审核</span>';
                    }else{
                        $status = '<span class="label label-danger">已拒绝</span>';
                    }
                    $html .= "<dd><i class=\"fa fa-fw  fa-bell\"></i>：".$status."</dd>";
                    $html .= "<dd><i class=\"fa fa-fw  fa-pencil-square\"></i>：".date('Y-m-d H:i',$model->created_at)."</dd>";
                    $html .= "</dl>";
                    return $html;
                },
                "headerOptions" => [
                    "width" => "200"
                ],
            ],
            [
                'label' => '自我介绍',
                'attribute'=>'self_desc',
                'format' => 'html',
                'content'=>function ($model) {
                    $html ="<textarea class='form-control' style='height: 100px;resize:none;' disabled>$model->self_desc</textarea>";
                    $html .='<audio src="http://yinyueshiting.baidu.com/data2/music/57a8cbc4b8e45f7e66ececd916730db3/257539247/257535276216000128.mp3?xcode=2f35db8e521b1ef3c85f964b2abbb8a2" controls style="margin: 0;"></audio>';
                    return $html;
                },
                "headerOptions" => [
                    "width" => "530",
                ],
            ],

            // 'self_picture',
            // 'self_media',
            // 'recommend',
            // 'status',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '审核',
                'template' => '{audit}',
                'buttons' => [
                    'audit' => function ($url, $model, $key) {
                        if($model->status==1)
                        {
                            $html = Html::a('<span class="glyphicon glyphicon-question-sign"></span>', ['record/audit','id'=>$model->id], ['title' => '审核','class'=>'btn btn-sm bg-olive margin-r-5']);
                        }elseif($model->status==2){
                            $html = Html::a('<span class="glyphicon glyphicon-ok-sign"></span>', ['record/audit','id'=>$model->id], ['title' => '已审核','class'=>'btn btn-sm bg-olive margin-r-5']);
                        }else{
                            $html = Html::a('<span class="glyphicon glyphicon-remove-sign"></span>', 'javascript:void(0)', ['title' => '已拒绝','class'=>'btn btn-sm bg-olive margin-r-5']);
                        }
                        return $html;
                    },
                ],
                'buttonOptions' => [
                    'class' => 'btn btn-sm bg-olive margin-r-5'
                ],
                "headerOptions" => [
                    "width" => "60"
                ],
            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>
