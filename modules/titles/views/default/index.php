<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-titles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="form">
        <?php $form = ActiveForm::begin(); ?>
        <table>
            <tr><th>title</th><th>url</th></tr>
            <?if(isset($items) && !empty($items)){?>
            <?php foreach($items as $i=>$item): ?>
                <tr>
                    <td><?= $form->field($item,"[$i]title")->label(false); ?></td>
                    <td><?= $form->field($item,"[$i]url")->label(false); ?></td>
                </tr>
            <?php endforeach; ?>
            <?php } ?>
            <?php if(!empty($model->title) && !empty($model->url)){?>
                <td><?= $form->field($model, 'url')->label(false); ?></td>
                <td><?= $form->field($model, 'title')->label(false); ?></td>
            <?php } ?>
        </table>
        <?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
        <?= Html::submitButton('Сохранить'); ?>
        <?php ActiveForm::end(); ?>
    </div><!-- form -->



</div>
