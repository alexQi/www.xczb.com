<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ActivityBase;

/**
 * activityBaseSearch represents the model behind the search form about `common\models\ActivityBase`.
 */
class activityBaseSearch extends ActivityBase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'start_time', 'end_time', 'status', 'is_delete', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['tilte', 'activity_desc', 'activity_rules'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ActivityBase::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
            'is_delete' => $this->is_delete,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tilte', $this->tilte])
            ->andFilterWhere(['like', 'activity_desc', $this->activity_desc])
            ->andFilterWhere(['like', 'activity_rules', $this->activity_rules]);

        return $dataProvider;
    }
}
