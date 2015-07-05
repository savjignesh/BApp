<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustItemDiscount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-item-discount-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_Id')->textInput() ?>

    <?= $form->field($model, 'customer_Id')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'created_Id')->textInput() ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'updated_Id')->textInput() ?>

    <?= $form->field($model, 'updated_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
