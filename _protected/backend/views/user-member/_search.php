<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\UserMemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-member-search">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
               <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <?= $form->field($model, 'user_id') ?>
            <?= $form->field($model, 'country_id') ?>
            <?= $form->field($model, 'mobile') ?>
            <?= $form->field($model, 'created_at') ?>
            <?= $form->field($model, 'updated_at') ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app/buttons', 'search'), ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton(Yii::t('app/buttons', 'reset'), ['class' => 'btn btn-default']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>