<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FundLog;

/**
 * FundLogSearch represents the model behind the search form about `app\models\FundLog`.
 */
class FundLogSearch extends FundLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'flow', 'type'], 'integer'],
            [['name', 'order_sn', 'time_created', 'remark'], 'safe'],
            [['amount'], 'number'],
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
        $query = FundLog::find();

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
            'flow' => $this->flow,
            'amount' => $this->amount,
            'type' => $this->type,
            'time_created' => $this->time_created,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'order_sn', $this->order_sn])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
