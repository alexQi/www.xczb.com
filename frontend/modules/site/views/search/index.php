<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron">
        <form class="" method="get" >
            <div class="form-group">
                <?=Html::input('text','keyword','',['class'=>'form-control input-lg']); ?>
            </div>
            <?=Html::submitButton('搜索',['class'=>'btn btn-success btn-lg']);?>
        </form>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>天气</h2>

                <p><?php echo $weather; ?></p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>新闻</h2>

                <p><?php echo $news; ?></p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>笑话</h2>

                <p><?php echo $funny; ?></p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
