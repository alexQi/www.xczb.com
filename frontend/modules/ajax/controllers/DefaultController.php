<?php

namespace frontend\modules\ajax\controllers;

use frontend\models\ApplyUserService;
use yii\db\Exception;

/**
 * Default controller for the `module` module
 */
class DefaultController extends BaseController
{
    /**
     * @return array
     */
    public function actionUserList()
    {
        $ApplyUserService = new ApplyUserService();
        $list = $ApplyUserService->getUserApplyList();

        $dataList = [];
        foreach ($list as $item)
        {
            $value['id']     = $item['id'];
            $value['name']   = $item['apply_name'];
            $value['desc']   = $item['self_desc'];
            $value['height'] = '275';
            $value['icon']   = $item['self_picture'];
            $value['width']  = '200';
            $value['music']  = $item['self_media'];
            $value['votes'] = $item['votes'] ? $item['votes'] : 0;

            $dataList[] = $value;
        }

        $this->ajaxReturn = $dataList;
        return $this->ajaxReturn;
    }

    public function actionDoVote()
    {
        try{
            if (!$this->getData['id'] || !$this->getData['vote_user'])
            {
                throw new Exception('参数错误');
            }

        }catch (Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }

        return $this->ajaxReturn;
    }
}
