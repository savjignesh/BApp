<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\GridView;

use yii\bootstrap\Modal;
use app\models\Item;
use app\models\Customer;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Bill */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="bill-form">
	<div class="row">
		<div class="col-md-12">
		<?php $form = ActiveForm::begin(); ?>
		<?php echo $form->errorSummary($model); ?>
		<!-- <div id="customer">dD</div> -->
			
		<?php
			// Modal::begin([
			// 	'header' => '<h2>Insert Item Detail</h2>',
			// 	'id' => 'customer-model'
			// ]);
			// echo '<div id="customervalue">fff</div>';
			// Modal::end();
		?>

		<div class="row">
			<div class=" col-md-6 col-sm-6">
			
				<?php //$form->field($model, 'customer_Id')->textInput() ?>
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
				<?php //$form->field($model, 'gross_amount')->textInput(['maxlength' => 50]) ?>

				<?php //$form->field($model, 'vat')->textInput(['maxlength' => 50]) ?>
			</div>
			<div class=" col-md-6 col-sm-6">
				
				
				<?php // $form->field($model, 'tax')->textInput(['maxlength' => 50]) ?>

				<?php //$form->field($model, 'discount')->textInput(['maxlength' => 50]) ?>

				<?php //$form->field($model, 'total_items')->textInput(['maxlength' => 50]) ?>

				<?= '<label>Bill Date</label>'; ?>
				<?=  DatePicker::widget([
					'model' => $model,
					'name' => 'Bill[bill_date]',
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
			</div>
		</div>
		<!-- <table class="table table-striped table-bordered detail-view">
			<tbody>
			<tr><th colspan=2>Total Items</th><td colspan=2><?php echo $model->total_items; ?></td></tr>
			<tr><th>Net Amount</th><td><?php echo $model->net_amount; ?></td><th>Gross Amount</th><td><?php echo $model->gross_amount; ?></td></tr>
			<tr><th>Vat</th><td><?php echo $model->vat; ?></td><th>Tax</th><td><?php echo $model->tax; ?></td></tr>
			</tbody>
		</table> -->
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
		<?php ActiveForm::end(); ?>

		</div>
	</div>
</div>