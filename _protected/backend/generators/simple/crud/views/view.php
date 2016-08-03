<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$title = Yii::t('app/models', '<?= StringHelper::basename($generator->modelClass) ?>').': '.$model-><?= $generator->getNameAttribute() ?>;
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/models', '<?= StringHelper::basename($generator->modelClass.('Plurar')) ?>'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper well <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-24">
                <h1><?= "<?= " ?>Html::encode($title); ?></h1>
                <p>
                    <?= "<?= " ?>Html::a(Yii::t('app/buttons', 'view_all'), ['index'], ['class' => 'btn btn-info']) ?>
                    <?= "<?= " ?>Html::a(Yii::t('app/buttons', 'create'), ['create'], ['class' => 'btn btn-success']) ?>
                    <?= "<?= " ?>Html::a(Yii::t('app/buttons', 'update'), ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
                    <?= "<?= " ?>Html::a(Yii::t('app/buttons', 'delete'), ['delete', <?= $urlParams ?>], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app/buttons', 'delete_item'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?= "<?= " ?>DetailView::widget([
                    'model' => $model,
                    'attributes' => [
            <?php
            if (($tableSchema = $generator->getTableSchema()) === false) {
                foreach ($generator->getColumnNames() as $name) {
                    echo "            '" . $name . "',\n";
                }
            } else {
                foreach ($generator->getTableSchema()->columns as $column) {
                    $format = $generator->generateColumnFormat($column);
                    echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n            ";
                }
            }
            ?>
        ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
