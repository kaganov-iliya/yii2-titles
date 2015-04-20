<?php

namespace app\modules\titles;

use Yii;
use app\modules\titles\web\Asset;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\titles\controllers';

    public function init()
    {
        parent::init();
        Asset::register(Yii::$app->getView());
    }
}
