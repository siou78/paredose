<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>
use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$title = Yii::t('app/models', '<?= StringHelper::basename($generator->modelClass) ?>Plurar');
$this->title = Yii::$app->name.' | '.$title;
$this->params['breadcrumbs'][] = $title;
?>
<div class="adminCrudWrapper well <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1><?= "<?= " ?>Html::encode($title) ?></h1>
<?php if(!empty($generator->searchModelClass)): ?>
<?= "               <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>
                <p><?= "<?= " ?>Html::a(Yii::t('app/buttons', 'create').' '.Yii::t('app/models', '<?= StringHelper::basename($generator->modelClass) ?>'), ['create'], ['class' => 'btn btn-success']); ?></p>
<?= $generator->enablePjax ? '                    <?php Pjax::begin(); ?>' : '' ?>
                
<?php if ($generator->indexWidgetType === 'grid'): ?>
                    <?= "<?= " ?>GridView::widget([
                        'dataProvider' => $dataProvider,
                        'layout'=> "{pager}{summary}\n{items}\n{pager}",
                        'tableOptions' => ['class' => 'table table-bordered table-striped table-hover table-responsive'],
                        'pager' => [
                            'firstPageLabel' => 'First',
                            'lastPageLabel' => 'Last',
                        ],
                        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n                           'columns' => [\n" : "  'columns' => [\n"; ?>
                                ['class' => 'yii\grid\SerialColumn'],
<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "                                '" . $name . "',\n";
        } else {
            echo "                              // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "                                '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "                              // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>
                <?= $generator->enablePjax ? '<?php Pjax::end(); ?>' : '' ?>
    
            </div>
        </div>
    </div>
</div>