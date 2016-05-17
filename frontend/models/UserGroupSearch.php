<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserGroup;

/**
 * UserGroupSearch represents the model behind the search form about `frontend\models\UserGroup`.
 */
class UserGroupSearch extends UserGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'group_owner_id'], 'integer'],
            [['group_name', 'group_registration_date'], 'safe'],
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
        $current_logged_user_id = Yii::$app->user->identity->id; //get the id of the current user

        $query = UserGroup::find()->where(['group_owner_id' => $current_logged_user_id]);

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
            'group_id' => $this->group_id,
            'group_owner_id' => $this->group_owner_id,
            'group_registration_date' => $this->group_registration_date,
        ]);

        $query->andFilterWhere(['like', 'group_name', $this->group_name]);

        return $dataProvider;
    }
}
