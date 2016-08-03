<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

use common\helpers\VariousHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$title = Yii::t('app/models', 'ProductCategoryPlurar');
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper">
    <div class="container-fluid product-category-index">
        <div class="row">
            <div class="col-xs-24">
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
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?php 
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'class' => 'kartik\grid\SerialColumn',
                                'mergeHeader' => false,
                            ],
                            'id',
                            'name',
                            'sys_name',
                            'rank',
                            [
                                'attribute' => 'created_at', 'format' => [
                                    'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']
                            ],
                            /* [
                                'attribute' => 'updated_at', 'format' => [
                                    'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']
                            ],*/
                            [
                                'class' => 'kartik\grid\ActionColumn',
                                'mergeHeader' => false,
                                'contentOptions' => [
                                    'class' => 'gridActionColumn',
                                ],
                                'buttons' => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Yii::$app->urlManager->createUrl(['product-category/view','id' => $model->id, 'edit' => 't']), ['title' => Yii::t('app/labels', 'edit'),]);
                                    }
                                ],
                            ],
                        ],
                        'floatHeader' => true,
                        'floatHeaderOptions' => [
                            'top' => 0
                        ],
                        // 'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                        'headerRowOptions' => [
                            'class' => 'kartik-sheet-style'
                        ],
                        'filterRowOptions' => [
                            'class' => 'kartik-sheet-style'
                        ],
                        'pjax' => true,
                        // set your toolbar
                        'toolbar' => [
                            ['content' =>
                                Html::a('<i class="iconLeft fa fa-plus"></i> '.Yii::t('app/buttons', 'create'), ['create'], ['class' => 'btn btn-success']).' '.
                                Html::a('<i class="fa fa-repeat"></i> ', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app/buttons', 'reset_grid')])
                            ],
                            '{export}',
                            '{toggleData}',
                        ],
                        // set export properties
                        'export'=>[
                            'fontAwesome' => true
                        ],
                        'responsiveWrap' => true,
                        'responsive' => true,
                        'hover' => true,
                        'condensed' => false,
                        'bordered' => true,
                        'striped' => true,
                        'showPageSummary' => false,
                        'persistResize' => false,
                        'toggleDataOptions' => [
                            'minCount' => 10
                        ],
                        'pager' => [
                            'options' => ['class' => 'pagination'],   // set class name used in ui list of pagination
                            'prevPageLabel' => '<i class="fa fa-angle-left"></i>',   // Set the label for the "previous" page button
                            'nextPageLabel' => '<i class="fa fa-angle-right"></i>',   // Set the label for the "next" page button
                            'firstPageLabel' => '<i class="fa fa-angle-double-left"></i>',   // Set the label for the "first" page button
                            'lastPageLabel' => '<i class="fa fa-angle-double-right"></i>',    // Set the label for the "last" page button
                            'nextPageCssClass' => 'next',    // Set CSS class for the "next" page button
                            'prevPageCssClass' => 'prev',    // Set CSS class for the "previous" page button
                            'firstPageCssClass' => 'first',    // Set CSS class for the "first" page button
                            'lastPageCssClass' => 'last',    // Set CSS class for the "last" page button
                            'maxButtonCount' => 10,    // Set maximum number of page buttons that can be displayed
                        ],
                        'panel' => [
                            'heading' => '<h3 class="panel-title"><i class="iconLeft fa fa-th-list"></i> '.Yii::t('app/buttons', 'list').' '.$title.'</h3>',
                            'type' => 'success',
                            //'before' => Html::a('<i class="iconLeft fa fa-plus"></i> '.Yii::t('app/buttons', 'create'), ['create'], ['class' => 'btn btn-success']),
                            //'after' => Html::a('<i class="iconLeft fa fa-repeat"></i> '.Yii::t('app/buttons', 'reset_grid'), ['index'], ['class' => 'btn btn-info']),
                            'showFooter' => false,
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>