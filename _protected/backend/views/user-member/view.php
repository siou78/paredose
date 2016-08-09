<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\VariousHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UserMember */

$title = Yii::t('app/models', 'UserMember').': '.$user->id;
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', 'UserMemberPlurar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper well user-member-view">
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
                        [
                            'action' => ['update', 'id' => $user->id],
                            'title' => Yii::t('app/buttons', 'update'),
                        ],
                        [
                            'action' => ['view', 'id' => $user->id],
                            'title' => Yii::t('app/buttons', 'view'),
                        ],
                    ]
                ]);
                ?>
                <?= DetailView::widget([
                    'model' => $user,
                    'attributes' => [
                        'id',
                        'username',
                        'email',
                        'userProfile.firstname',
                        [
                            'label' => 'Lastname',
                            'value' => $user_profile->lastname,
                        ],
                        [
                            'label' => 'Mobile',
                            'value' => $user_member->mobile,
                        ],
                        [
                            'label' => 'Country',
                            'value' => (!empty($user_member->country)) ? $user_member->country->name : null,
                        ],
                        [
                            'label' => 'Status',
                            'value' => ($user->userToUserRoles[0]->active == 1) ? 'Active' : 'inactive',
                        ],
                        'created_at',
                        'updated_at',
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
