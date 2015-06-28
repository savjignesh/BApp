<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Item;
/* @var $this yii\web\View */
/* @var $model app\models\Bill */
/* @var $form yii\widgets\ActiveForm */
?>


		<div class="row">
		  <?= $form->field($model, 'item_Id')->textInput(['maxlength' => 50]) ?>
		</div>
	