<?php
namespace backend\modules\ajax\controllers;

use yii;
use yii\base\Exception;
use common\components\MyQiniu;
use yii\web\UploadedFile;
use common\models\ActivityAdvert;


/**
 * ajax 消息处理类
 * Class MessageController
 * @package backend\modules\ajax\controllers
 */
class ActivityController extends BaseController
{
    /**
     * ajax 上传
     */
    public function actionAjaxUpload(){
        try{
            $model = new ActivityAdvert();
            $uploadFile = UploadedFile::getInstance($model,'tempFileUrl');
            if (!$uploadFile){
                throw new Exception('未检测到上传文件');
            }

            $qiniu = new MyQiniu(yii::$app->params['qiniu']['AccessKey'], yii::$app->params['qiniu']['SecretKey'],yii::$app->params['qiniu']['uploadUrl'], 'images');
            $key = 'QB'.time();
            $result  = $qiniu->uploadFileGetReturn($uploadFile->tempName,$key);
            if (!$result){
                throw new Exception('上传文件失败');
            }

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = '上传成功';
            $this->ajaxReturn['data']  = $result;
        }catch(Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }
        return $this->ajaxReturn;
    }
}