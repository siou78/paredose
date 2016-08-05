<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

use common\models\productCategory;
use common\helpers\VariousHelper;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$title = Yii::t('app/models', 'Product').': '.$model->id;
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', 'ProductPlurar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper">
    <div class="container product-view">
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
                            'heading' => '<i class="iconLeft fa fa-info-circle"></i> '.$model->id,
                            'type' => DetailView::TYPE_SUCCESS,
                        ],
                        'buttons2' => '{delete} {view} {reset} {save}',
                        'attributes' => [
                            'id',
                            [
                                'attribute' => 'product_category_id',
                                'value' => !empty($model->productCategory) ? HTML::a($model->productCategory->name, ['/product-category/view', 'id' => $model->product_category_id], ['class' => 'external']) : null,
                                'format' => 'html',
                                'type' => 'dropDownList',
                                'items' => ['' => 'Select'] + ArrayHelper::map(
                                        productCategory::find()
                                            ->select(['id', 'name'])
                                            ->where([])
                                            ->orderBy('name')
                                            ->asArray()
                                            ->all(),
                                        'id', 'name'),
                                'options' => [
                                    'class' => 'selectpicker show-tick',
                                    'encode' => false,
                                ],
                            ],
                            'name',
                            'price',
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
                            'url' => ['delete', 'id' => $model->id],
                            'params' => [
                                'id' => $model->id, 
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