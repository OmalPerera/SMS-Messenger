<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MessageDelivery;

/**
 * MessageDeliverySearch represents the model behind the search form about `frontend\models\MessageDelivery`.
 */
class MessageDeliverySearch extends MessageDelivery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_id', 'message_id'], 'integer'],
            [['phone_number', 'delivery_message', 'delivery_date_time'], 'safe'],
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
        $query = MessageDelivery::find();

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
            'delivery_id' => $this->delivery_id,
            'message_id' => $this->message_id,
            'delivery_date_time' => $this->delivery_date_time,
        ]);

        $query->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'delivery_message', $this->delivery_message]);

        return $dataProvider;
    }
}
