<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Item;
/* @var $this yii\web\View */
/* @var $model app\models\Billdetail */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="billdetail-create">
<div class="billdetail-form">
	<div class="row">
		<div class=" col-md-12">
		<?php $form = ActiveForm::begin([
			'enableClientValidation' => true,
			'id' => 'Billform'
		]); ?>
		<?php $items = Item::findOne($model->item_Id); ?>
		<div class=" col-md-8 col-sm-8">
			<h4><?php echo $items->item_name; ?></h4>
		</div>
		<div class="col-md-4 col-sm-4">
			<?= '<img src="'.Yii::$app->homeUrl.'/'.$items->image.'" width="90px" height="90px">'; ?>
		</div>
		</div>
		
	</div>
	<div class="row">
		<div class=" col-md-12">
		<?php $form = ActiveForm::begin([
			'enableClientValidation' => true,
			'id' => 'Billform'
		]); ?>
		<div class="col-md-4 col-sm-4">
			<?= $form->field($model, 'qty')->textInput(['maxlength' => 50]) ?>

			

			<?= $form->field($model, 'discount')->textInput(['maxlength' => 50]) ?>
			<?= $form->field($model, 'price')->textInput(['readonly' => true, 'maxlength' => 50]) ?>
			<?= $form->field($model, 'vat')->textInput(['readonly' => true,'maxlength' => 50]) ?>

			<?= $form->field($model, 'tax')->textInput(['readonly' => true, 'maxlength' => 50]) ?>
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
		</div>
		<div class=" col-md-8 col-sm-8">
			<h4>df</h4>
		</div>
		
		<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
</div>