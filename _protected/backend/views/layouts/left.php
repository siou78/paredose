<?php
use yii\helpers\HTML;
?>
<aside id="adminSidebar" class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= HTML::img('/backend/images/profile.jpg', ['class' => 'user-image image pull-left', 'alt' => 'User Image']); ?>
            </div>
            <div class="info pull-right">
                <p><?= Yii::$app->session['name']; ?></p>
                <p><small><i class="fa fa-circle text-success"></i> Online</small></p>
            </div>
        </div>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '<i class="fa fa-dashboard"></i> Admin Panel', 'options' => ['class' => 'header'], 'encode' => false],
                    [
                        'label' => 'Overview', 'icon' => 'fa fa-database', 'url' => ['/site/index'], 'active' => (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index'),
                    ],
                    [
                        'label' => 'Product Categories', 'icon' => 'fa fa-circle-o', 'url' => ['/product-category/index'], 'active' => Yii::$app->controller->id == 'product-category', 'items' => [
                            ['label' => 'View All', 'icon' => 'fa fa-list', 'url' => ['/product-category/index'],],
                            ['label' => 'Create', 'icon' => 'fa fa-plus', 'url' => ['/product-category/create'],],
                        ]
                    ],
                    [
                        'label' => 'Products', 'icon' => 'fa fa-circle-o', 'url' => ['/product/index'], 'active' => Yii::$app->controller->id == 'product', 'items' => [
                            ['label' => 'View All', 'icon' => 'fa fa-list', 'url' => ['/product/index'],],
                            ['label' => 'Create', 'icon' => 'fa fa-plus', 'url' => ['/product/create'],],
                        ]
                    ],
                    [
                        'label' => 'User Role', 'icon' => 'fa fa-circle-o', 'url' => ['/user-role/index'], 'active' => Yii::$app->controller->id == 'user-role', 'items' => [
                            ['label' => 'View All', 'icon' => 'fa fa-list', 'url' => ['/user-role/index'],],
                            ['label' => 'Create', 'icon' => 'fa fa-plus', 'url' => ['/user-role/create'],],
                        ]
                    ],
                    [
                        'label' => 'Members', 'icon' => 'fa fa-circle-o', 'url' => ['/user-member/index'], 'active' => Yii::$app->controller->id == 'user-member', 'items' => [
                            ['label' => 'View All', 'icon' => 'fa fa-list', 'url' => ['/user-member/index'],],
                            ['label' => 'Create', 'icon' => 'fa fa-plus', 'url' => ['/user-member/create'],],
                        ]
                    ],
                    
                ],
            ]
        ) ?>
    </section>
</aside>
