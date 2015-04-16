<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 15.04.2015
 * Time: 23:27
 */

namespace app\modules\titles\components;

use yii;
use yii\base\Behavior;
use yii\web\Controller;

class Log extends Behavior
{
    public $custom_info = NULL;


    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'writeLog', //Можно еще ща что-то зацепиться
        ];
    }

    public function writeLog()
    {

        echo '----------------------------------------';
        die();

//        $controller = $this->owner;
//        file_put_contents('log.txt', "{$_SERVER['REMOTE_ADDR']}|" . time() . "|" . $controller::className() . "|" . $this->custom_info . "n", FILE_APPEND);
    }
}