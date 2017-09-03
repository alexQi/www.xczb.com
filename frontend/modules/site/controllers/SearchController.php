<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-7-18
 * Time: 下午5:00
 */
namespace frontend\modules\site\controllers;

use common\components\Common;
use frontend\models\Search;
use frontend\controllers\BaseController;

class SearchController extends BaseController
{

    const GOOGLE = 'https://www.google.com.hk';
    //https://www.google.com.hk/#safe=strict&q=11
    /**
     * 加载google搜索首页
     */
    public function actionIndex()
    {
        if (!empty($this->queryParam))
        {
            $html = Common::httpRequest('https://www.google.com.hk/#safe=strict&q='.$this->queryParam['keyword']);
//            var_dump($html);die();
            echo $html;
        }else{
            $search  = new Search();
            $weather = $search->getTip('杭州天气');
            $news    = $search->getTip('新闻');
            $funny   = $search->getTip('笑话');
            return $this->render('index',[
                'weather' => $weather,
                'news'    => $news,
                'funny'   => $funny
            ]);
        }
    }
}