<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%activity_apply_data}}".
 *
 * @property integer $id
 * @property integer $apply_id
 * @property integer $activity_id
 * @property integer $count_num
 */
class ActivityApplyData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity_apply_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apply_id', 'activity_id', 'count_num'], 'required'],
            [['apply_id', 'activity_id', 'count_num'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'apply_id' => 'Apply ID',
            'activity_id' => 'Activity ID',
            'count_num' => 'Count Num',
        ];
    }
}
