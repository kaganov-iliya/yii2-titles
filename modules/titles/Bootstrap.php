<?php

namespace app\modules\titles;

use Yii;

class Bootstrap implements \yii\base\BootstrapInterface
{
    static private $_inited = false;
    
    public function bootstrap($app)
    {
        Yii::$app->getView()->on(\yii\base\View::EVENT_AFTER_RENDER,function(){
            if(self::$_inited === false)
            {
                self::$_inited = true;
                Yii::$app->getView()->title = 'My';
            }
        });
    }
}
