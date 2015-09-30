<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">
	<div class="row">
	<div class="col-md-6 col-sm-6">
		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'customer_name')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'home_phone')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'mobile1')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'mobile2')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'customer_email')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'address1')->textArea(['rows' => 6]) ?>

		<?= $form->field($model, 'address2')->textArea(['rows' => 6]) ?>
		
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Continue' : 'Continue', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>	
		</div>
		<div class=" col-md-6 col-sm-6">
		<?= $form->field($model, 'city')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'current_balance')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'marketing_person_name')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'marketing_persion_contact')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'accounting_persion_name')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'accounting_persion_contact')->textInput(['maxlength' => 100]) ?>
	
		<?= $form->field($model, 'dnd_sms')->dropDownList(['0' => 'No', '1' => 'Yes']); ?>

		<?= $form->field($model, 'dnd_call')->dropDownList(['0' => 'No', '1' => 'Yes']);  ?>

		<?= $form->field($model, 'dnd_email')->dropDownList(['0' => 'No', '1' => 'Yes']);  ?>

		</div>
		
		<?php ActiveForm::end(); ?>
	</div>
</div>