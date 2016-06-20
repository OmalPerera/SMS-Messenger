<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Message;

/**
 * MessageSearch represents the model behind the search form about `frontend\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'message_author_id'], 'integer'],
            [['message_subject', 'message_body', 'message_create_date', 'message_sent_group'], 'safe'],
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
        $query = Message::find();

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
            'message_id' => $this->message_id,
            'message_create_date' => $this->message_create_date,
            'message_author_id' => $this->message_author_id,
        ]);

        $query->andFilterWhere(['like', 'message_subject', $this->message_subject])
            ->andFilterWhere(['like', 'message_body', $this->message_body])
            ->andFilterWhere(['like', 'message_sent_group', $this->message_sent_group]);

        return $dataProvider;
    }
}
