<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;
use kartik\widgets\TouchSpin;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="product-form">
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
    <?= $form->field($model, 'product_category_id')->dropDownList(ArrayHelper::map(ProductCategory::find()->all(), 'id', 'name'),  ['prompt' => 'Select', 'encode' => false, 'class' => 'selectpicker show-tick']); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'price', [ 
        'options' => [
            'class' => 'oddEvenItem form-group',
        ],
        'template' => '{label}<div class="col-sm-18 noPadding"><div class="mdInput">{input}</div></div>',
    ])->widget(TouchSpin::classname(), [
        'options' => [
            'class' => 'mdInput',
        ],
        'pluginOptions' => [
            //'initval' => 3.00,
            'max' => 1000000000,
            'step' => 1,
            'decimals' => 2,
            'prefix' => '€',
            'class' => 'smInput',
            'verticalbuttons' => true,
            'verticalupclass' => 'glyphicon glyphicon-plus',
            'verticaldownclass' => 'glyphicon glyphicon-minus',
        ]
    ]); ?>
    <div class="form-group row">
        <div class="col-xs-12 col-sm-6 col-md-3 pull-right text-right clearfix">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app/buttons', 'create') : Yii::t('app/buttons', 'update'), ['class' => 'fullWidth btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
