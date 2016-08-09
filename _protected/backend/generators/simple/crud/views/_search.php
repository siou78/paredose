<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            <?= "   <?php " ?>$form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
<?php
$count = 0;
foreach ($generator->getColumnNames() as $attribute) {
    if (++$count < 6) {
        echo "            <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n";
    } else {
        echo "            <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n";
    }
}
?>
            <div class="form-group">
                <?= "<?= " ?>Html::submitButton(Yii::t('app/buttons', 'search'), ['class' => 'btn btn-primary']) ?>
                <?= "<?= " ?>Html::resetButton(Yii::t('app/buttons', 'reset'), ['class' => 'btn btn-default']) ?>
            </div>
            <?=     "<?php " ?>ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>