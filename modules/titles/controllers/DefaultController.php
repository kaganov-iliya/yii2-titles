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
                if ($item->save()) {
                    $count++;
                }
            }
            if(Yii::$app->request->post()['UrlTitles']['url'] == '' || Yii::$app->request->post()['UrlTitles']['title'] == ''){
                return $this->redirect(['index']);
            }
            $model->save();

            Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
            return $this->render('index', [
                'items' => $items,
                'model' => $model,
            ]);
        }elseif ($model->load(Yii::$app->request->post())) {
            $count = 0;
            foreach ($items as $item) {
                if ($item->save()) {
                    $count++;
                }
            }
            if(Yii::$app->request->post()['UrlTitles']['url'] == '' || Yii::$app->request->post()['UrlTitles']['title'] == ''){
                return $this->redirect(['index']);
            }
            $model->save();

            Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
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






//        $dataProvider = new ActiveDataProvider([
//            'query' => UrlTitles::find(),
//        ]);
//
//        $model = new UrlTitles();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['index']);
//        }
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//            'model' => $model,
//        ]);

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new UrlTitles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
