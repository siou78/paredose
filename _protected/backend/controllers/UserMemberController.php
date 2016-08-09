<?php
namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\UserProfile;
use common\models\UserMember;
use common\models\UserRole;
use common\models\UserToUserRole;
use common\models\search\UserMemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
                    'delete' => ['POST'],
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
    public function actionView($id)
    {
        $user = User::findOne($id);
        $user_profile = UserProfile::findOne($id);
        $user_member = UserMember::findOne($id);
        return $this->render('view', [
            'user' => $user,
            'user_profile' => $user_profile,
            'user_member' => $user_member,
        ]);
    }

    /**
     * Creates a new UserMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user = new User();
        $user->scenario = 'create';
        $user_profile = new UserProfile();
        $user_member = new UserMember();
        $user_to_user_role = new UserToUserRole();
        if ($user->load(Yii::$app->request->post()) && $user_profile->load(Yii::$app->request->post()) && $user_member->load(Yii::$app->request->post()) && $user->validate() && $user_profile->validate() && $user_member->validate()) {
            $user->status = 10;
            $user->setPassword($user->password);
            $user->generateAuthKey();

            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($user->save(false)) {

                    $user_profile->user_id = $user->id;
                    $user_profile->save(false);
                    
                    $user_member->user_id = $user->id;
                    $user_member->save(false);
                   
                    $user_role = UserRole::findOne(['sys_name' => 'member']);
                    $user_to_user_role->user_id = $user->id;
                    $user_to_user_role->user_role_id = $user_role->id;
                    $user_to_user_role->active = 1;
                    $user_to_user_role->save();
                    $transaction->commit();
                } else {
                    //var_dump($user->errors);exit;
                }
            } catch (Exception $ex) {
                $transaction->rollBack();
                throw $e;
            }
            return $this->redirect(['index']);
        } else {
            //var_dump($user->errors);exit;
            return $this->render('create', [
                'user' => $user,
                'user_profile' => $user_profile,
                'user_member' => $user_member,
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
        $user = User::findOne($id);
        $user->scenario = 'update_user_member';
        $user_profile = $user->userProfile;
        $user_member = $user->userMember;
        if ($user->load(Yii::$app->request->post()) && $user_profile->load(Yii::$app->request->post()) && $user_member->load(Yii::$app->request->post()) && $user->validate() && $user_profile->validate() && $user_member->validate()) 
        {
            
            $transaction = Yii::$app->db->beginTransaction();
            $user->setPassword($user->password);
            try {
                if($user->save(false)) {
                        //var_dump($user);
                        //var_dump($user_profile);
                        //var_dump($user_member);exit;
                    }
                    $user_profile->save(false);
                    $user_member->save(false);
                    $transaction->commit();
            } catch (Exception $ex) {
                $transaction->rollBack();
                throw $e;
            }
            return $this->redirect(['view', 'id' => $user->id]);
        } else {
            return $this->render('update', [
                'user' => $user,
                'user_profile' => $user_profile,
                'user_member' => $user_member,
            ]);
        }
    }

    /**
     * Deletes an existing UserMember model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();       
        $user_to_user_role = UserToUserRole::findOne($id);
        $user_to_user_role->active = 0;
        $user_to_user_role->save();
        //return $this->redirect(['index']);
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
