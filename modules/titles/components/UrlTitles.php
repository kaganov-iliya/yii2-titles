<?php

namespace app\modules\titles\components;

use Yii;

class UrlTitles extends \yii\base\Component
{
    public function run()
    {
        //print_R($_SERVER['REQUEST_URI']);exit;
        Yii::$app->getView()->title = 'My';
    }
}
