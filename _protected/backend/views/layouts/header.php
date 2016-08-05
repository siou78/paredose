<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<header class="main-header">
    <?= Html::a('<span class="logo-mini">'.HTML::img(Yii::$app->urlManagerFrontend->baseUrl.'/themes/common_assets/images/logo-initials.png', ['class' => 'imageLogo', 'alt' => Yii::$app->name.' Logo']).'</span><span class="logo-lg">'.HTML::img(Yii::$app->urlManagerFrontend->baseUrl.'/themes/common_assets/images/logo.png', ['class' => 'imageLogo', 'alt' => Yii::$app->name.' Logo']).'</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
    
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= HTML::img('/backend/images/profile.jpg', ['class' => 'user-image image pull-left', 'alt' => 'User Image']); ?>
                        <span class="hidden-xs"><?= Yii::$app->session['name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?= HTML::img('/backend/images/profile.jpg', ['class' => 'user-image image pull-left', 'alt' => 'User Image']); ?>
                            <p>
                                <?= Yii::$app->session['name']; ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out <i class="fa fa-sign-out"></i>',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-danger']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
