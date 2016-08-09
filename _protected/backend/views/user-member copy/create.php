<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;

/* @var $this yii\web\View */
/* @var common\models\UserMember $model */

$title = Yii::t('app/buttons', 'create').' '.Yii::t('app/models', 'UserMember');
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', 'UserMemberPlurar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper">
    <div class="container user-member-create">
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
                <div class="well">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="iconLeft fa fa-plus"></i> <?= $title ?></h3>
                        </div>
                        <?= $this->render('_form', [
                            'model' => $model,
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>