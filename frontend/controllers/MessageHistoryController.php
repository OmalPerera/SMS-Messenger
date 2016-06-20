<?php

namespace frontend\controllers;

use Yii;
use frontend\models\MessageHistory;
use frontend\models\MessageHistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MessageHistoryController implements the CRUD actions for MessageHistory model.
 */
class MessageHistoryController extends Controller
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
     * Lists all MessageHistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MessageHistory model.
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
     * Creates a new MessageHistory model.
     * @return mixed
     */
    public function actionCreate($message_id, $sentlist_id, $delivery_id)
    {


        if( isset($message_id) 
            && isset($sentlist_id) 
            && isset($delivery_id) 
            && !empty($message_id) 
            && !empty($sentlist_id) 
            && !empty($delivery_id)
            ){

                //echo $message_id;
                //echo $sentlist_id;
                //echo $delivery_id;

                $model = new MessageHistory();
                //$model->load(Yii::$app->request->post()){
                $model->message_id = $message_id;
                $model->message_sent_list = $sentlist_id;
                $model->delivery_id = $delivery_id;
                $model->save();


        }else{
            throw new NotFoundHttpException('Some data were missed');
        }


        /*
        $model = new MessageHistory();

        if (
            $model->load(Yii::$app->request->post())){
            //$model->message_sent_list = $sentlistid;
            $model->message_id = '45';
            $model->delivery_id = '1';
            $model->save();

            return $this->redirect(['view', 'id' => $model->history_log_id]);
        } 

        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing MessageHistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $session_sentlist_id = Yii::$app->session;
        $session_sentlist_id->open();
        $sentlist_var = $session_sentlist_id['a'];
        echo $sentlist_var;

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->history_log_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MessageHistory model.
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
     * Finds the MessageHistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MessageHistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MessageHistory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
