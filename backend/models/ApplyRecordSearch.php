<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ApplyRecord;

/**
 * ApplyRecordSearch represents the model behind the search form about `common\models\ApplyRecord`.
 */
class ApplyRecordSearch extends ApplyRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'phone', 'status', 'created_at', 'updated_at'], 'integer'],
            [['apply_name', 'self_desc', 'self_picture', 'self_media'], 'safe'],
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
        $query = ApplyRecord::find();

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
            'gender' => $this->gender,
            'phone' => $this->phone,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'apply_name', $this->apply_name])
            ->andFilterWhere(['like', 'self_desc', $this->self_desc])
            ->andFilterWhere(['like', 'self_picture', $this->self_picture])
            ->andFilterWhere(['like', 'self_media', $this->self_media]);

        return $dataProvider;
    }
}
