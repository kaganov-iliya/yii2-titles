<?php

namespace app\modules\titles;

<<<<<<< HEAD
use Yii;
use app\modules\titles\web\Asset;
=======
>>>>>>> 81fd153813862f17b178ada66158893587078334

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\titles\controllers';

    public function init()
    {
        parent::init();
        Asset::register(Yii::$app->getView());
        // custom initialization code goes here
    }
}
