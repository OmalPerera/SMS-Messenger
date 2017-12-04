<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\RecipientList;
use frontend\models\UserGroup;
use yii\db\Query;
use yii\web\NotFoundHttpException;

/**
 * RecipientListSearch represents the model behind the search form about `frontend\models\RecipientList`.
 */
class RecipientListSearch extends RecipientList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recipient_list_id', 'group_id'], 'integer'],
            [['recipient_name', 'recipient_phone_number'], 'safe'],
            [['param'], 'string', 'on' => 'RECIPIENTS'],
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


    /**
    *   +++++++++++++++++++++++++++++++++++++ NOTE ++++++++++++++++++++++++++++++++++++++++++
    *
    *   # This PHP for search the recipient list according to groups.
    *   # RecipientList Table stucture
    *       | recipient_list_id | group_id | recipient_name | recipient_phone_number |
    *
    *   # So when user clicks on a grid item of Groups (a URL will creates & navigates to it)
    *       Example URL : .../frontend/web/index.php?r=recipient-list%2Frecipients&scenario=RECIPIENTS&params=6
    *           # last digit says the group id.
    *           # So that recipient list can be querry & sent to search model ( $querry ).
    *
    *   # But there is a problem of user change the URL in the address bar.
    *   # so other Users have the posibilibilty to see the others recipient lists.
    *
    *   # To avoid this;
    *       # $current_logged_user_id - Get the id of current logged user
    *       # $group_id_array - Get the groups created by him (array)
    *       # Check any group_id matches with the $group_id which came from the URL.
    *           -> if matches set the $isGroupOwnedByLoggedUser = true
    *           -> if not $isGroupOwnedByLoggedUser will be remain same (false)
    *
    *       # Then use an if condition to check the value in $isGroupOwnedByLoggedUser
    *           -> if true -- navigates to the recipient list
    *           -> if false -- navigates to the 404 PAGE NOT FOUND
    */





    public function search($params)
    {

        $current_logged_user_id = Yii::$app->user->identity->id; //get the id of the current user
        $group_id = $params['params'];

            $valid_groups_id_query = new Query;
            $valid_groups_id_query  ->select('group_id')
                                    ->from('user_group')
                                    ->where(['group_owner_id' => $current_logged_user_id]);

            $group_id_array = $valid_groups_id_query->all();
            //print_r($group_id_array['0']['group_id']);
            //print_r($group_id_array);


        $isGroupOwnedByLoggedUser = false;
        foreach ($group_id_array as $value) {

            if($group_id == $value['group_id']){
                $isGroupOwnedByLoggedUser = true;
            }
        }

        if(!$isGroupOwnedByLoggedUser){
            throw new NotFoundHttpException('The requested page does not exist.');

        }else{

            $query = RecipientList::find()
            ->where(['group_id' => $group_id])
            //->andWhere(['group_id' => $current_logged_user_id])
            //->andWhere(['RecipientLists.group_id' => $current_logged_user_id])
            ;

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                //'pagination' => ['pageSize' => 5,],
            ]);

            $this->load($params);

            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                // $query->where('0=1');
                return $dataProvider;
            }

            $query->andFilterWhere([
                'recipient_list_id' => $this->recipient_list_id,
                'group_id' => $this->group_id,
            ]);

            $query->andFilterWhere(['like', 'recipient_name', $this->recipient_name])
                ->andFilterWhere(['like', 'recipient_phone_number', $this->recipient_phone_number]);

            return $dataProvider;

        }
    }


    public function converttomobilenumber($selectedIds){
      $recipientId = '30'; //should use a loop to get seperate id form selectedIds

      $query = RecipientList::find()
      ->where(['recipient_list_id' => $recipientId]);

      $dataProvider = new ActiveDataProvider([
          'query' => $query,
          //'pagination' => ['pageSize' => 5,],
      ]);
      $dataProvider = 'abc';
      return $dataProvider;

    }
}
