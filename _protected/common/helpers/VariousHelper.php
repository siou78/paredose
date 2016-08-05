<?php
namespace common\helpers;

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\Growl;
use kartik\widgets\Alert;

use Yii;

/**
 * Class that contains various helper methods.
 */
class VariousHelper
{
    
    public static function getCurrentWrapId()
    {
        $id = Yii::$app->controller->action->id;
        if (!empty(Yii::$app->controller->actionParams['view'])) {
            $id .= Yii::$app->controller->actionParams['view'];
        }
        return $id;
    }
    
    public static function transformDateTime($params = array())
    {
        $params = array_merge([
            'value' => null,
            'year_position_from' => '2',
            'month_position_from' => '0',
            'day_position_from' => '1',
            'year_position_to' => '2',
            'month_position_to' => '0',
            'day_position_to' => '1',
            'datetime_delimiter_from' => ' ',
            'datetime_delimiter_to' => ' ',
            'date_delimiter_from' => '-',
            'date_delimiter_to' => '-',
            'time_delimiter_from' => ':',
            'time_delimiter_to' => ':',
        ], $params);
        $value = $params['value'];
        if (empty($value)) {
            return false;
        }
        $temp = explode($params['datetime_delimiter_from'], $value);
        $date = $temp[0];
        $time = $temp[1];
        
        $year = $date[$params['year_position_from']];
        $month = $date[$params['month_position_from']];
        $day = $date[$params['day_position_from']];
        
        if (!checkdate($month, $day, $year)) {
            return false;
        }
        $new_date = [];
        $new_date[$params['year_position_to']] = $year;
        $new_date[$params['month_position_to']] = $month;
        $new_date[$params['day_position_to']] = $day;
        $s_the_new_date = implode($params['date_delimiter_to'], $new_date);
        return $s_the_new_date.''.$params['datetime_delimiter_to'].$time;
    }
    
    public static function file_get_contents_curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    
    public static function htmlInfoBlock($params = array()) {
        $params = array_merge([
            'text' => '',
            'textWrapperClass' => 'panel panel-warning',
            'textHeadingClass' => 'panel-heading',
        ], $params);
        $s = '';
        $s .= '
            <div class="'.$params['textWrapperClass'].'">
                <div class="'.$params['textHeadingClass'].'">
                    <p>'.$params['text'].'</p>
                </div>
            </div>';
        return $s;
    }
    
    /*
    public static function htmlAlertMessages() {
        if (!empty(Yii::$app->session->getAllFlashes())) {
            foreach (Yii::$app->session->getAllFlashes() as $message) {
                echo Alert::widget([
                    'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                    'title'=> (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                    'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                    'body' => (!empty($message['body'])) ? Html::encode($message['body']) : 'Message Not Set!',
                    'showSeparator' => true,
                    'delay' => (!empty($message['delay'])) ? $message['delay'] : 100,//This delay is how long before the message shows
                    //'delay' => 100, //This delay is how long before the message shows
                    'options' => [
                        'delay' => (!empty($message['duration'])) ? $message['duration'] : 4000, //This delay is how long the message shows for
                        'showProgressbar' => (!empty($message['showProgressbar'])) ? $message['showProgressbar'] : true, //This delay is how long the message shows for                    
                        'placement' => [
                            'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                            'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                        ]
                    ]
                ]);
            }
        }
    }
    */
    
    public static function htmlAlertMessages() {
        if (!empty(Yii::$app->session->getAllFlashes())) {
            foreach (Yii::$app->session->getAllFlashes() as $message) {
                echo Growl::widget($message);
            }
        }
    }
    
    public static function htmlGrowlMessages() {
        if (!empty(Yii::$app->session->getAllFlashes())) {
            foreach (Yii::$app->session->getAllFlashes() as $message) {
                echo Growl::widget($message);
            }
        }
    }
    
    public static function htmlAdminItemMenu($params = array()) {
        $params = array_merge([
            'model' => '',
            'actions' => '',
            'heading_title' => '',
        ], $params);
        $current_action_html = '';
        ?>
        <div class="adminCrudTitle">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-9">
                            <h1 class="heading"><?= $params['heading_title']; ?></h1>
                        </div>
                        <div class="adminActionMenu col-xs-12 col-sm-3">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-primary"><i class="fa fa-list"></i>Action Menu</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <?php if (!empty($params['actions'])) : ?>
                                <ul class="dropdown-menu">
                                    <?php foreach($params['actions'] as $key => $value) : ?>
                                        <?php empty($value['options']) ? $value['options'] = [] : empty($value['options']);  ?>
                                        <?php if (Url::current() == Url::to($value['action'])) : ?>
                                            <?php $current_action_html .= ''
                                                    . '<li role="separator" class="divider"></li>'
                                                    . '<li>'.Html::a(Yii::t('app/buttons', $value['title']).' <i class="showTick fa fa-check"></i>', $value['action'], $value['options']).'</li>';
                                                continue;
                                            ?>
                                        <?php endif; ?>
                                        <li><?= Html::a(Yii::t('app/buttons', $value['title']), $value['action'], $value['options']); ?></li>
                                    <?php endforeach; ?>
                                    <?= $current_action_html; ?>
                                </ul>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    }
    
}