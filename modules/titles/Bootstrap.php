<?php

namespace app\modules\titles;

use Yii;
use app\modules\titles\models\UrlTitles;
use  yii\helpers\Url;

class Bootstrap implements \yii\base\BootstrapInterface
{

    static private $_inited = false;
    
    public function bootstrap($app)
    {
        Yii::$app->getView()->registerCssFIle('style.css');
        Yii::$app->getView()->on(\yii\base\View::EVENT_AFTER_RENDER,function(){

            $ulr_titles = UrlTitles::find()
                ->all();
            $current_url = Url::to('');
            $current_url = str_replace('/web/index.php?r=', '', $current_url);
            foreach($ulr_titles as $url_title){
                if($url_title->url == $current_url || '/'.$url_title->url == $current_url || $url_title->url == Url::to('') || $url_title->url == $_SERVER['HTTP_HOST'].Url::to('')){
                    if(self::$_inited === false)
                    {
                        self::$_inited = true;
                        Yii::$app->getView()->title = $url_title->title;
                    }
                }

            }
        });
    }
}
