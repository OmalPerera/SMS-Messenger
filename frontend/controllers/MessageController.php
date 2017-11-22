<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Message;
use frontend\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
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
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new MessageSearch();
        //filters the records by user id (currently logged user)
        $dataProvider = $searchModel->search([$searchModel->formName()=>['message_author_id'=> Yii::$app->user->identity->id ]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session_group_id = Yii::$app->session;
        $session_group_id->open();
        $currently_selected_group_id = $session_group_id['grou_id'];
        $query = new Query;
            $query->select('group_name')
                  ->from('user_group')
                  ->where(['group_id' => $currently_selected_group_id]);
        $currently_selected_group_name = $query->one();

        //store the currently selected group name in the SESSION $session_group_id['group_name']
        $session_group_id['group_name'] = $currently_selected_group_name;
        $session_group_id->close();
        //print_r($currently_selected_group_name['group_name']);


        //generating a random uniqe ID with thr prefix 'msg_'
        $random_msg_id = uniqid("msg_");

        //store the $random_msg_id in a SESSION for the use in the message-History part
        $session_message_info = Yii::$app->session;
        $session_message_info->open();
        $session_message_info['msg_id'] = $random_msg_id;
        $session_message_info->close();


        $model = new Message();
        if ($model->load(Yii::$app->request->post())) {
            $model->message_id = $random_msg_id;
            $model->message_author_id = Yii::$app->user->identity->id;
            $model->message_create_date = date('Y-m-d H:i:s');
            $model->message_subject = 'msg1';
            $model->message_sent_group = $currently_selected_group_name['group_name'];
            $model->save();

            //return $this->redirect(['view', 'id' => $model->message_id]);

            //redirecting page after sending the message
            $session_first_group_id = Yii::$app->session;
            $session_first_group_id->open();
            $redi_group_id = $session_first_group_id['group_id'];

            Yii::$app->session->setFlash('success', "Message Sent Successfuly");

            return $this->redirect(['/recipient-list/recipients', 'scenario' => 'RECIPIENTS' ,'params' => $redi_group_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->message_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

        /*
        * allows only the logged users to View, Update, delete the records
        */
        $query = new Query;
        $query  ->select('message_author_id')
                ->from('message')
                ->where(['message_id' => $id]);

        $logged_user_id = $query->one();
        //print_r($logged_user_id['message_author_id']);

        if (($model = Message::findOne($id)) !== null && Yii::$app->user->identity->id == $logged_user_id['message_author_id']) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
