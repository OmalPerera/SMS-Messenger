<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MessageHistory;

/**
 * MessageHistorySearch represents the model behind the search form about `frontend\models\MessageHistory`.
 */
class MessageHistorySearch extends MessageHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['history_log_id'], 'integer'],
            [['message_id', 'message_sent_list', 'delivery_id'], 'safe'],
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
        $query = MessageHistory::find();

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
            'history_log_id' => $this->history_log_id,
        ]);

        $query->andFilterWhere(['like', 'message_id', $this->message_id])
            ->andFilterWhere(['like', 'message_sent_list', $this->message_sent_list])
            ->andFilterWhere(['like', 'delivery_id', $this->delivery_id]);

        return $dataProvider;
    }
}
