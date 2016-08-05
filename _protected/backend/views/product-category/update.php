<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategory */

$title = Yii::t('app/buttons', 'update').' '.Yii::t('app/models', 'ProductCategory').': '.$model->name;
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', 'ProductCategoryPlurar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/buttons', 'update');
?>
<div class="adminCrudWrapper">
    <div class="container product-category-update">
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
                        ]
                    ]);
                ?>
                <div class="well">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="iconLeft fa fa-pencil-square-o"></i> <?= Yii::t('app/buttons', 'update').': '.$model->name; ?></h3>
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