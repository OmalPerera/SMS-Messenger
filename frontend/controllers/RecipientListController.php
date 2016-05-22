<?php

namespace frontend\controllers;

use Yii;
use frontend\models\RecipientList;
use frontend\models\RecipientListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RecipientListController implements the CRUD actions for RecipientList model.
 */
class RecipientListController extends Controller
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


//+++++++++++++++++++++++ code for show recipient list corresponding to groups ++++++++++++++++++++++++++

    public function actionRecipients($params)
    {

        $searchModel = new RecipientListSearch();

        // Get the params from GET request
        $params = Yii::$app->request->queryParams;
        // Parse them to /app/model/ModelSearch::search() 
        $dataProvider = $searchModel->search($params);


        /*  When user create a group, group ID which he is currently selected is automatically inputs into the Database
            So when user selects a group, it is stored inside a session. (@variable $session_group_id)
            then it can be used in the 'actionCreate' function in the "RecipientListCOntroller"
        */
            $currently_selected_group_id = $params['params'];
            $session_group_id = Yii::$app->session;
            $session_group_id->open();
            //print_r($currently_selected_group_id);
            $session_group_id['grou_id'] = $currently_selected_group_id;

        $this->layout = 'recipient_ui';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
   
    }

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++







    /*
        No need of showing all the recipient list; 
        only need to show relevent list in each groups 
    */

    /**
     * Lists all RecipientList models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        $searchModel = new RecipientListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    */

    /**
     * Displays a single RecipientList model.
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
     * Creates a new RecipientList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*  session "session_group_id" is created to get the currently selected user group by the user
            This was store in the RecipientListCOntroller -> acrionRecipient Fuction
        */
        $session_group_id = Yii::$app->session;
        $session_group_id->open();
        $currently_selected_group_id = $session_group_id['grou_id'];

        $model = new RecipientList();

        if ($model->load(Yii::$app->request->post())) {
            $model->group_id = $currently_selected_group_id;    //currently selected group id is automatically inserted into the recipient_list.group_id column in database
            $session_group_id->destroy();                       //'session_group_id' destroyed because it is not needed furthur more.
            $model->save();
             
            return $this->redirect(['/recipient-list/recipients', 'scenario' => 'RECIPIENTS' ,'params' => $currently_selected_group_id]);
           

        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * Updates an existing RecipientList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->recipient_list_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RecipientList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        //return $this->redirect(['/recipient-list/recipients', 'scenario' => 'RECIPIENTS' ,'params' => $currently_selected_group_id]);
         
        //$session_first_group_id = Yii::$app->session;
        //$session_first_group_id->open();
        $redi_group_id = $$session_group_id['grou_id'];
          
        return $this->redirect(['index']);
    }

    /**
     * Finds the RecipientList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RecipientList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecipientList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
