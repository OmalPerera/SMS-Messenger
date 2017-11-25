<?php

namespace frontend\controllers;

use Yii;
use frontend\models\SentList;
use frontend\models\SentListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;


/**
 * SentListController implements the CRUD actions for SentList model.
 */
class SentListController extends Controller
{




    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }



    /**
     * Lists all SentList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SentListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SentList model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    /*gettig the recipient list from Ajax code in js/main.js on SEND button click*/
    public function actionGetrecipientids()
    {
      if (Yii::$app->request->isAjax) {
          $data = Yii::$app->request->post();

          $recipient_id = implode(",",$data['keylist']);

          //convertint Recipient IDs to Phone numbers
          //$searchModel = new RecipientListSearch();
          //$dataProvider = $searchModel->converttomobilenumber($recipient_id);

          $session_message_info = Yii::$app->session;
          $session_message_info->open();
          //store the $random_sent_list_id in a SESSION
          $session_message_info['recipient_id'] = $recipient_id; //$dataProvider;
          //$session_message_info['recipient_mn'] = '0717074657';
          $session_message_info->close();

          //throw new NotFoundHttpException($recipient_id);
        }else {
          throw new NotFoundHttpException('Problem with Retrieving Recipients.');
        }
    }

    /**
     * Creates a new SentList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate($message_id)
    {

      //generating a random uniqe ID with thr prefix 'sent_'
      $random_sent_list_id = uniqid("sent_");

      $session_message_info = Yii::$app->session;
      $session_message_info->open();
      //store the $random_sent_list_id in a SESSION
      $session_message_info['sent_list_id'] = $random_sent_list_id;
      $recipient_id = $session_message_info['recipient_id'];

      $model = new SentList();
      $model->sent_list_id = $random_sent_list_id;
      $model->recipient_phone_number = $recipient_id;
      $model->save();

      //+++++++++++++++++ msg delivevery id is hardcoded, because that part is not completed +++++++++
      $delivery_id = 'deli_5767fa02de5ff';
      $session_message_info->close();

      Yii::$app->runAction('message-history/create', ['message_id'=>$message_id, 'sentlist_id'=>$random_sent_list_id, 'delivery_id'=>$delivery_id]);

    }

    /**
     * Updates an existing SentList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sent_list_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SentList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SentList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SentList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SentList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
