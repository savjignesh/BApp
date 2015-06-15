<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'home_phone')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'mobile1')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'mobile2')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'customer_email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'current_balance')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'marketing_person_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'marketing_persion_contact')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'accounting_persion_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'accounting_persion_contact')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'dnd_sms')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'dnd_call')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'dnd_email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'id_deleted')->textInput() ?>
<!--
   <?= $form->field($model, 'created_Id')->textInput() ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'updated_Id')->textInput() ?>

    <?= $form->field($model, 'updated_time')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
