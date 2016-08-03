<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>
use yii\helpers\Html;
use common\components\widgets\AdminNavBar;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$title = Yii::t('app/buttons', 'update').' '.Yii::t('app/models', '<?= StringHelper::basename($generator->modelClass) ?>').': '.$model-><?= $generator->getNameAttribute() ?>;
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', '<?= StringHelper::basename($generator->modelClass.('Plurar')) ?>'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = Yii::t('app/buttons', 'update');
?>
<div class="adminCrudWrapper well <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-24">
                <?= "<?= " ?>AdminNavBar::widget(['params' => ['items' => [['text' => Yii::t('app/buttons', 'view_all'), 'url' => 'index', 'htmlOptions' => ['class'=>'btn btn-info']]]]]); ?>
                <h1><?= "<?= " ?>Html::encode($title) ?></h1>
                <?= "<?= " ?>$this->render('_form', [
                    'model' => $model,
                ]); ?>
            </div>
        </div>
    </div>
</div>