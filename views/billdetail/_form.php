<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Billdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="billdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bill_Id')->textInput() ?>

    <?= $form->field($model, 'item_Id')->textInput() ?>

    <?= $form->field($model, 'qty')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'vat')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tax')->textInput(['maxlength' => 50]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
