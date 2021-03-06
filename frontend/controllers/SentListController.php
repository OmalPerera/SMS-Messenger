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

    /**
     * Creates a new SentList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            //print_r($data['keylist']['0']);
            //$recipient_id = $data['keylist']['0'];
            //echo $recipient_id;

            $recipient_id = implode(",",$data['keylist']);
            //echo $recipient_id;


            //generating a random uniqe ID with thr prefix 'sent_'
            $random_sent_list_id = uniqid("sent_");

            $session_message_info = Yii::$app->session;
            $session_message_info->open();
            //store the $random_sent_list_id in a SESSION
            $session_message_info['sent_list_id'] = $random_sent_list_id;

            $message_id = $session_message_info['msg_id'];
            /*+++++++++++++++++ msg delivevery id is hardcoded, because that part is not completed +++++++++*/
            $delivery_id = 'deli_5767fa02de5ff';
            $session_message_info->close();


            $model = new SentList();
            $model->sent_list_id = $random_sent_list_id;
            $model->recipient_phone_number = $recipient_id;
            $model->save();


            Yii::$app->runAction('message-history/create', ['message_id'=>$message_id, 'sentlist_id'=>$random_sent_list_id, 'delivery_id'=>$delivery_id]);



        }

 /*       $model = new SentList();

        if ($model->load(Yii::$app->request->post())) {
            $model->recipient_phone_number = $data;
            $model->save();

            return $this->redirect(['view', 'id' => $model->sent_list_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        */

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
