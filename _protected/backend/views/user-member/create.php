<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UserMember */

$title = Yii::t('app/buttons', 'create').' '.Yii::t('app/models', 'UserMember');
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', 'UserMemberPlurar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper well user-member-create">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
            <?php  echo VariousHelper::htmlAdminItemMenu(['model' => null, 'heading_title' => Html::encode($title), 
                    'actions' => [
                        [
                            'action' => ['index'],
                            'title' => Yii::t('app/buttons', 'view_all'),
                        ],
                        [
                            'action' => ['create'],
                            'title' => Yii::t('app/buttons', 'create'),
                        ],
                    ]
                ]); 
                ?>
                <?= $this->render('_form', [
                    'user' => $user,
                    'user_profile' => $user_profile,
                    'user_member' => $user_member,
                ]); ?>
            </div>
        </div>
    </div>
</div>