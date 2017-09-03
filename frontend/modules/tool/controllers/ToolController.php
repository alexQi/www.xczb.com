<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-7-11
 * Time: 下午2:46
 */
namespace frontend\modules\tool\controllers;

use yii;
use common\components\yii2beanstalk\Beanstalk;
use common\models\Mail;
use frontend\controllers\BaseController;

class ToolController extends BaseController
{
    public function actionIndex()
    {
        $beanstalk = new Beanstalk();
        $beanstalk->useTube('oliu.sendEmail');
        $param['from'] = [yii::$app->params['adminEmail']=>'Alex'];
        $param['to']   = yii::$app->params['adminEmail'];

        $put = $beanstalk->put(json_encode($param));

        if (!$put){
            exit($put);
        }
    }

    public function actionSendMail(){
        $mail = new Mail();
        $param['from'] = [yii::$app->params['adminEmail']=>'Alex'];
        $param['to']   = yii::$app->params['adminEmail'];
        $res = $mail->SendMail($param);
        var_dump($res);
    }
}