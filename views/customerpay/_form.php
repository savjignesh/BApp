<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use kartik\date\DatePicker;

use app\models\Customer;
use kartik\select2\Select2
/* @var $this yii\web\View */
/* @var $model app\models\Customerpay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customerpay-form">
	<div class="row">
	<div class=" col-md-6 col-sm-6">
    <?php $form = ActiveForm::begin(); ?>

   
	<?= $form->field($model, 'customer_Id')->widget(Select2::classname(), [
					'data' => ArrayHelper::map(Customer::find()->all(),'customer_ID','customer_name'),
					'language' => 'en',
					'options' => ['placeholder' => 'Select a customer', 'multiple' => false],
					'pluginOptions' => [
						'tags' => true,
						'maximumInputLength' => 10
					],
				]);
				?>
	<?= $form->field($model, 'payment_mode')->dropDownList(['Cash' => 'Cash', 'Credit' => 'Credit']); ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

	<label class="control-label" for="customerpay-amount">Payment Date</label>
	<?=  DatePicker::widget([
					'model' => $model,
					'name' => 'Customerpay[payment_date]',
					'value' => date('d-m-Y'),
					'type' => DatePicker::TYPE_COMPONENT_APPEND,
					'readonly' => true,
					'removeButton' => false,
					'pluginOptions' => [
						'autoclose'=>true,
						'format' => 'dd-mm-yyyy',
						'todayHighlight' => true
					],
					'options' => [
						'class' => 'form-control',
						'id' => 'bill-bill_date'
					]
					
				]); 
				?>
	 <br />
	<?= $form->field($model, 'remark')->textArea(['rows' => 6]) ?>
    <br />
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	</div>
	</div>
</div>
