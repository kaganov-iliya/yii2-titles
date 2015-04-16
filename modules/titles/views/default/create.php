<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\titles\models\UrlTitles */

$this->title = 'Create Url Titles';
$this->params['breadcrumbs'][] = ['label' => 'Url Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-titles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
