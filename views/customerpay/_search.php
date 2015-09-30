<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerpaySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customerpay-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customerpay_ID') ?>

    <?= $form->field($model, 'customer_Id') ?>

    <?= $form->field($model, 'payment_mode') ?>

    <?= $form->field($model, 'Amount') ?>

    <?= $form->field($model, 'payment_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
