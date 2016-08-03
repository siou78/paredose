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
            'fullSpan' => 24,
            'formConfig' => ['labelSpan' => 6, 'deviceSize' => ActiveForm::SIZE_SMALL, 'fullSpan' => 18]
            ]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'sys_name')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'rank')->textInput(); ?>
    <div class="form-group row">
        <div class="col-xs-24 col-sm-12 col-md-6 pull-right clearfix">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app/buttons', 'create') : Yii::t('app/buttons', 'update'), ['class' => 'fullWidth btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
