<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustItemDiscountSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-item-discount-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'item_Id') ?>

    <?= $form->field($model, 'customer_Id') ?>

    <?= $form->field($model, 'cust_item_discount_ID') ?>

    <?= $form->field($model, 'discount') ?>

    <?= $form->field($model, 'created_Id') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'updated_Id') ?>

    <?php // echo $form->field($model, 'updated_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
