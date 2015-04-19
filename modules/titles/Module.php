<?php

namespace app\modules\titles;

use app\modules\titles\web\Asset;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\titles\controllers';

    public function init()
    {
        Asset::register(Yii::$app->getView());
        parent::init();

        // custom initialization code goes here
    }
}
