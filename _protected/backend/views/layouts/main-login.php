<?php
use yii\helpers\Html;

use common\helpers\VariousHelper;

/* @var $this \yii\web\View */
/* @var $content string */


if (class_exists('backend\assets\AppAsset')) {
    backend\assets\AppAsset::register($this);
} else {
    app\assets\AppAsset::register($this);
}

dmstr\web\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="application-name" content="<?= Yii::$app->name; ?>" />
    <meta name="author" content="Konstantinos Mitsarakis" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="http://localhost/yii2_improved_template/favicon.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="body" class="adminWrapper hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>

    <div id="<?= VariousHelper::getCurrentWrapId(); ?>" class="wrapper wrap">

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>