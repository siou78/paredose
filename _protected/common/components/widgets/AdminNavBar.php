<?php
namespace common\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class AdminNavBar extends Widget
{
    public $params;

    public function init()
    {
        parent::init();
        foreach($this->params['items'] as $key => $value) {
            if (empty($value['htmlOptions']) || empty($value['htmlOptions']['class'])) {
                $this->params['items'][$key]['htmlOptions'] = ['class' => 'btn btn-primary'];
            }
        }
    }

    public function run()
    {
        return $this->render('adminNavBarView', array('params'=>$this->params));
    }
}