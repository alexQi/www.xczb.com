<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-7-18
 * Time: 下午5:59
 */
namespace frontend\models;

use yii\base\Model;
use common\models\Api;

class Search extends Model
{
    public function getTip($queryString)
    {
        $api = new Api();

        $api->queryParam['queryString'] = $queryString;

        $api->getApiInfo();

        return $api->run();
    }
}