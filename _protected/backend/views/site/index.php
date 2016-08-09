<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Members</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php if (count($data['user_members_recent']) > 0) : ?>
                        <ul class="products-list product-list-in-box">
                            <?php foreach($data['user_members_recent'] as $member) : ?>
                            <?php
                            $fullname = '';
                            $country = '';
                            if (!empty($member->userProfile)) {
                                $fullname = $member->userProfile->firstname.' '.$member->userProfile->lastname;
                                if (!empty($member->userMember->country)) {
                                    $country = $member->userMember->country->name;
                                }
                            }
                            ?>
                            <li class="item">
                                <div class="product-info">
                                    <?= HTML::a($fullname.' <span class="label label-warning pull-right">'.$country.'</span>', ['/usermember/view', 'id' => $member->id], ['class' => 'product-title']); ?>
                                    <span class="product-description"> <?= $member->email.' | '.$member->userMember->mobile; ?> </span>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        
                    </div>
                    <div class="box-footer text-center">
                        <?= HTML::a('View All Members', ['/usermember/index'], []); ?>
                    </div>
                </div>
            </div>
        </div>
        
        

        <div class="row">
            <div class="col-lg-3">
                <h3>Yii documentation</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h3>Yii forum</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h3>Yii extensions</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h3>Freetuts.org</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.freetuts.org/">Freetuts.org &raquo;</a></p>
            </div>
        </div>

    </div>
</div>

