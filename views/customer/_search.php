<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customer_ID') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'home_phone') ?>

    <?= $form->field($model, 'mobile1') ?>

    <?php // echo $form->field($model, 'mobile2') ?>

    <?php // echo $form->field($model, 'customer_email') ?>

    <?php // echo $form->field($model, 'address1') ?>

    <?php // echo $form->field($model, 'address2') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'current_balance') ?>

    <?php // echo $form->field($model, 'marketing_person_name') ?>

    <?php // echo $form->field($model, 'marketing_persion_contact') ?>

    <?php // echo $form->field($model, 'accounting_persion_name') ?>

    <?php // echo $form->field($model, 'accounting_persion_contact') ?>

    <?php // echo $form->field($model, 'dnd_sms') ?>

    <?php // echo $form->field($model, 'dnd_call') ?>

    <?php // echo $form->field($model, 'dnd_email') ?>

    <?php // echo $form->field($model, 'id_deleted') ?>

    <?php // echo $form->field($model, 'created_Id') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'updated_Id') ?>

    <?php // echo $form->field($model, 'updated_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
