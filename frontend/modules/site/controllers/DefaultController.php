<?php
namespace frontend\modules\site\controllers;

use frontend\controllers\BaseController;
use frontend\models\ApplyUserService;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class DefaultController extends BaseController
{
    public $layout = false;
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $advertList   = ApplyUserService::getAdvertList();
        $activityInfo = ApplyUserService::getActivityInfo();
        return $this->render('index',[
            'advertList' => $advertList,
            'activityInfo' => $activityInfo,
        ]);
    }
}
