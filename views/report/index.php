<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;
?>
<h1>Laider</h1>
<?php // echo $model->sdate; ?>
<div class="bill-form">
	<div class="row">
		<div class="col-md-12">
			<?php $form = ActiveForm::begin([
		        'id' => 'login-form',
		        'options' => ['class' => 'form-horizontal'],
		        'fieldConfig' => [
		            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
		            'labelOptions' => ['class' => 'col-lg-1 control-label'],
		        ],
		    ]); ?>
			<?php //echo $form->errorSummary($model); ?>
			<div class=" col-md-6 col-sm-6">
				
			

				<?php //$form->field($model, 'discount')->textInput(['maxlength' => 50]) ?>

				<?php //$form->field($model, 'total_items')->textInput(['maxlength' => 50]) ?>

				<?= '<label>Bill Date</label>'; ?>
				<?=  DatePicker::widget([
					'model' => $model,
					'name' => 'sdate',
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
			<div class="form-group">
				<?= Html::submitButton('Create') ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>

