<?php
namespace backend\controllers;

use common\models\User;
use common\models\UserRole;
use common\models\UserMember;
use common\models\UserProfile;

use common\models\LoginForm;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * Site controller.
 * It is responsible for displaying static pages, and logging users in and out.
 */
class SiteController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Declares external actions for the controller.
     *
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays the index (home) page.
     * Use it in case your home page contains static content.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = [];

        $role = UserRole::findOne(['sys_name' => 'member']);
        $member_role_id = $role['id'];

        //Recent Members
        $data['user_members_recent'] = User::find()
            ->joinWith(['userToUserRoles userToUserRoles', 'userProfile userProfile'])
            ->joinWith(['userMember userMember' => function(\yii\db\ActiveQuery $query) {
                $query->joinWith(['country country']);
            },])
            ->where(['userToUserRoles.user_role_id' => $member_role_id])
            ->orderBy('created_at')
            ->limit(10)
            ->all();
            //var_dump($data['user_members_recent']);exit;
        return $this->render('index', ['data' => $data]);
    }

    /**
     * Logs in the user if his account is activated,
     * if not, displays standard error message.
     *
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        $this->layout = '//main-login';
        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        // get setting value for 'Login With Email'
        $lwe = Yii::$app->params['lwe'];

        // if "login with email" is true we instantiate LoginForm in "lwe" scenario
        $lwe ? $model = new LoginForm(['scenario' => 'lwe']) : $model = new LoginForm() ;

        // everything went fine, log in the user
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            return $this->goBack();
        } 
        // errors will be displayed
        else 
        {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the user.
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
