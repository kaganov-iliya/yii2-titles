<?php

namespace app\modules\titles\controllers;

use yii\web\Controller;
use Yii;
use app\modules\titles\models\UrlTitles;
use yii\base\Model;

class DefaultController extends Controller
{



    public function actionIndex()
    {
        $items  = UrlTitles::find()
            ->all();
        $model = new UrlTitles();
        if (Model::loadMultiple($items, Yii::$app->request->post()) && $model->load(Yii::$app->request->post())) {
            $count = 0;
            foreach ($items as $item) {
                $item->save();
            }
            if(Yii::$app->request->post()['UrlTitles']['url'] == '' || Yii::$app->request->post()['UrlTitles']['title'] == ''){
                return $this->redirect(['index']);
            }
            $model->save();

            return $this->render('index', [
                'items' => $items,
                'model' => $model,
            ]);
        }elseif ($model->load(Yii::$app->request->post())) {
            $count = 0;
            foreach ($items as $item) {
                $item->save();
            }
            if(Yii::$app->request->post()['UrlTitles']['url'] == '' || Yii::$app->request->post()['UrlTitles']['title'] == ''){
                return $this->redirect(['index']);
            }
            $model->save();

            return $this->render('index', [
                'items' => $items,
                'model' => $model,
            ]);
        }else{
            return $this->render('index', [
                'items' => $items,
                'model' => $model,
            ]);
        }
    }
    protected function findModel($id)
    {
        if (($model = UrlTitles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
