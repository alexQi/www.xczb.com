<?php

namespace frontend\modules\ajax\controllers;

use yii;
use frontend\models\ApplyUserService;
use yii\base\Exception;

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
            $redis = yii::$app->redis;
            $VoteNum = $redis->get('vote_user_'.date('Ymd',time()).'_'.$this->getData['vote_user']);

            if ($VoteNum)
            {
                if ($VoteNum<3)
                {
                    $redis->incr('vote_user_'.date('Ymd',time()).'_'.$this->getData['vote_user']);
                }else{
                    throw new Exception('每人每天只能投3票');
                }
            }else{
                $redis->setex('vote_user_'.date('Ymd',time()).'_'.$this->getData['vote_user'],86400,1);
            }

            $voteApply = $redis->get('vote_apply_'.$this->getData['id']);
            if (!$voteApply)
            {
                $redis->set('vote_apply_'.$this->getData['id'],1);
            }else{
                $redis->incr('vote_apply_'.$this->getData['id']);
            }

            $this->ajaxReturn['state'] = 1;
            $this->ajaxReturn['message'] = '投票成功,感谢你的参与';
            $this->ajaxReturn['vote_num']= $redis->get('vote_apply_'.$this->getData['id']);

        }catch (Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }

        return $this->ajaxReturn;
    }
}
