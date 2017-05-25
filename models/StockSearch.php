<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RebateSearch represents the model behind the search form about `app\models\Rebate`.
 */
class StockSearch extends Stock
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'safe'],
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
        $query = Stock::find();

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
//            'user_id' => $this->user_id,
//            'time_expired' => $this->time_expired,
//            'state' => $this->state,
        ]);

        return $dataProvider;
    }

    public function mobileCompletionSearch($params)
    {
        $query = Stock::find();
        $this->load($params, '');

        if (!$this->validate()) {
            return false;
        }

        // grid filtering conditions
        $query->andWhere(['LIKE', 'code', $this->code,])
            ->limit(10);
        $result = $query->all();
        if($result){
            foreach($result as $i => $item){
                $result[$i] = [
                    'code' => $item->code,
                    'name' => $item->nameText,
                ];
            }
        }
        return $result;
    }
}
