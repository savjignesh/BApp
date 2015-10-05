<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<h1>Laider</h1>
<?php // echo $model->sdate; ?>

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
				<?php // $form->field($model, 'sdate')->textInput(['maxlength' => 50]) ?>
                <?= $form->field($model, 'sdate') ?>
                <?= $form->field($model, 'end_date') ?>
				<?php //$form->field($model, 'total_items')->textInput(['maxlength' => 50]) ?>




			</div>
			<div class="form-group">
				<?= Html::submitButton('Create') ?>
			</div>
			<?php ActiveForm::end(); ?>
