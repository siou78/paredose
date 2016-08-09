<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

use common\helpers\VariousHelper;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UserMember */

$title = Yii::t('app/models', 'UserMember').': '.$model->user_id;
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', 'UserMemberPlurar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper">
    <div class="container user-member-view">
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
                            'action' => ['view', 'id' => $model->id, 'edit' => 't'],
                            'title' => Yii::t('app/buttons', 'update'),
                        ],
                        [
                            'action' => ['view', 'id' => $model->id],
                            'title' => Yii::t('app/buttons', 'view'),
                        ],
                    ]
                ]);
                ?>
                <div class="well">
                    <?php 
                    echo DetailView::widget([
                        'model' => $model,
                        'condensed' => false,
                        'hover' =>true,
                        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
                        'panel' => [
                            'heading' => '<i class="iconLeft fa fa-info-circle"></i> '.$model->user_id,
                            'type' => DetailView::TYPE_SUCCESS,
                        ],
                        'attributes' => [
                            'user_id',
                            'mobile',
                            [
                                'attribute' => 'created_at',
                                'format' => [
                                   'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A'
                                ],
                                'type' => DetailView::INPUT_WIDGET,
                                'widgetOptions' => [
                                    'class' => DateControl::classname(),
                                    'type' => DateControl::FORMAT_DATETIME
                                ]
                            ],
	                        [
                                'attribute' => 'updated_at',
                                'format' => [
                                   'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A'
                                ],
                                'type' => DetailView::INPUT_WIDGET,
                                'widgetOptions' => [
                                    'class' => DateControl::classname(),
                                    'type' => DateControl::FORMAT_DATETIME
                                ]
                            ],
                        ],
                        'deleteOptions' => [
                            'url' => ['delete', 'id' => $model->user_id],
                            'params' => [
                                'id' => $model->user_id, 
                                'custom_param' => true,
                            ],
                        ],
                        'alertContainerOptions' => [
                            'class' => 'adminCrudAlertContainer',
                        ],
                        'enableEditMode' => true,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>