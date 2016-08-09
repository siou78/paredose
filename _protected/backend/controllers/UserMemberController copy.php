<?php
namespace backend\controllers;

use Yii;
use common\models\UserMember;
use common\models\search\UserMemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\InvalidCallException;

/**
 * UserMemberController implements the CRUD actions for UserMember model.
 */
class UserMemberController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserMember models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserMemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single UserMember model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($user_id)
    {
        $model = $this->findModel($user_id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('kv-detail-info', '<i class="glyphicon glyphicon-ok-sign"></i> '.Yii::t('app', 'data_saved'));
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new UserMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserMember();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserMember model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserMember model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        //return $this->redirect(['index']);
    }
    */
    
    /**
     * Deletes an existing UserMember model.
     * @return mixed
     */
    public function actionDelete($id) {
        $post = Yii::$app->request->post();
        if (Yii::$app->request->isPost && !isset($post['custom_param'])) {
            $this->findModel($id)->delete();
            return;
        } elseif (Yii::$app->request->isAjax && isset($post['custom_param'])) {
            $id = $post['id'];
            if ($this->findModel($id)->delete()) {
                echo Json::encode([
                    'success' => true,
                    'messages' => [
                        'kv-detail-info' => '<i class="glyphicon glyphicon-ok-sign"></i> '.Yii::t('app', 'data_deleted').' '.HTML::a(Yii::t('app', 'proceed_link'), ['/usermember/index'], ['class' => 'underline'])
                    ]
                ]);
            } else {
                echo Json::encode([
                    'success' => false,
                    'messages' => [
                        'kv-detail-error' => '<i class="glyphicon glyphicon-remove-sign"></i> '.Yii::t('app', 'data_not_deleted'),
                    ]
                ]);
            }
            return;
        }
        throw new InvalidCallException("You are not allowed to do this operation. Contact the administrator.");
    }

    /**
     * Finds the UserMember model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserMember the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserMember::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
