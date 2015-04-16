<?php

namespace app\modules\titles\controllers;

use yii\web\Controller;
use Yii;
use app\modules\titles\models\UrlTitles;
use yii\data\ActiveDataProvider;

class DefaultController extends Controller
{



    public function actionIndex()
    {
//        return $this->render('index');
        $dataProvider = new ActiveDataProvider([
            'query' => UrlTitles::find(),
        ]);

        $customers = UrlTitles::findOne([
            'url' => $_GET['r'],
//            'status' => Customer::STATUS_ACTIVE,
        ]);

//        $customers = UrlTitles::find()
//            ->all();
// echo '<pre>'; print_r($customers); die();
        return $this->render('index', [
            'customers' => $customers,
            'dataProvider' => $dataProvider,
        ]);

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
