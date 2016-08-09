<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\base\InvalidValueException;

use common\models\User;
use common\models\Admin;

class MyUser extends \yii\web\User
{
    
    protected function afterLogin($identity, $cookieBased, $duration)
    {
        $user = User::findOne(['id' => Yii::$app->user->id]);
        if (!empty($user->userProfile->firstname) && !empty($user->userProfile->lastname)) {
            Yii::$app->session['name'] = $user->userProfile->firstname.' '.$user->userProfile->lastname;
        } else {
            Yii::$app->session['name'] = $user->username;
        }
        return parent::afterLogin($identity, $cookieBased, $duration);
    }
}
