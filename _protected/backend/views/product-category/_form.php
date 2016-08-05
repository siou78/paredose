<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="product-category-form">
    <?php 
        $form = ActiveForm::begin([
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'options' => [
                'role' => 'form',
                'class' => 'oddEvenWrapper wrapperBordered',
                'validateOnSubmit' => true,
            ],
            'fullSpan' => 12,
            'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL, 'fullSpan' => 9]
            ]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'sys_name')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'rank')->textInput(); ?>
    <div class="form-group row">
        <div class="col-xs-12 col-sm-6 col-md-3 pull-right text-right clearfix">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app/buttons', 'create') : Yii::t('app/buttons', 'update'), ['class' => 'fullWidth btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
