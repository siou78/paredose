<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>
use yii\helpers\Html;
use common\components\widgets\AdminNavBar;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$title = Yii::t('app/buttons', 'create').' '.Yii::t('app/models', '<?= StringHelper::basename($generator->modelClass) ?>');
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', '<?= StringHelper::basename($generator->modelClass.('Plurar')) ?>'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper well <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <?= "<?= " ?>AdminNavBar::widget(['params' => ['items' => [['text' => Yii::t('app/buttons', 'view_all'), 'url' => 'index', 'htmlOptions' => ['class'=>'btn btn-info']]]]]); ?>
                <h1><?= "<?= " ?>Html::encode($title) ?></h1>
                <?= "<?= " ?>$this->render('_form', [
                    'model' => $model,
                ]); ?>
            </div>
        </div>
    </div>
</div>