<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Country;


/* @var $this yii\web\View */
/* @var $model common\models\UserMember */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-member-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($user, 'password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($user, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($user_profile, 'firstname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($user_profile, 'lastname')->textInput(['maxlength' => true]) ?>
	<?= $form->field($user_member, 'mobile')->textInput(['maxlength' => true]); ?>
	<?= $form->field($user_member, 'country_id', [])->label('Country')->dropDownList(
        ArrayHelper::map(Country::find()->all(), 'id', 'name'),  ['prompt' => 'Select', 'class' => 'selectpicker show-tick']); ?>
	
    <div class="form-group">
        <?= Html::submitButton($user_member->isNewRecord ? Yii::t('app/buttons', 'create') : Yii::t('app/buttons', 'update'), ['class' => $user_member->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
