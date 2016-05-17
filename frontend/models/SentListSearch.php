<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SentList;

/**
 * SentListSearch represents the model behind the search form about `frontend\models\SentList`.
 */
class SentListSearch extends SentList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sent_list_id'], 'integer'],
            [['recipient_phone_number'], 'safe'],
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
        $query = SentList::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'sent_list_id' => $this->sent_list_id,
        ]);

        $query->andFilterWhere(['like', 'recipient_phone_number', $this->recipient_phone_number]);

        return $dataProvider;
    }
}
