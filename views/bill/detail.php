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
		
		<?php $items = Item::findOne($model->item_Id); ?>
		<div class=" col-md-6 col-sm-6">
			<h4><b>Name: </b><?php echo $items->item_name; ?></h4>
			<br /><?= $items->description; ?>
		</div>
		<div class="col-md-6 col-sm-6">
			<?= '<img src="'.Yii::$app->homeUrl.'/'.$items->image.'" width="200px" >'; ?>
		</div>
		</div>
		
	</div>
	<div class="row">
		<div class=" col-md-12">
		<?php $form = ActiveForm::begin([
			'enableClientValidation' => true,
			'id' => 'Billform'
		]); ?>
		<div class="col-md-6 col-sm-6">
			<?= $form->field($model, 'qty')->textInput(['maxlength' => 50,'autofocus' => 'autofocus']) ?>
			<div style="display:none;">
				<?= $form->field($model, 'discount')->textInput(['maxlength' => 50,'type' => 'hidden']) ?>
			</div>
			<?= $form->field($model, 'price')->textInput(['maxlength' => 50]) ?>
			
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				<?= Html::Button('Cancel', ['class' => 'btn btn-danger','data-dismiss'=> 'modal', 'aria-hidden'=>'true']) ?>
			</div>
		</div>
		<div class=" col-md-6 col-sm-6">
			<div id="numericInput" >
			 <table id="keypad" >
				<tr>
					<td class="key1">1</td>
					<td class="key1">2</td>
					<td class="key1">3</td>
				</tr>
				<tr>
					<td class="key1">4</td>
					<td class="key1">5</td>
					<td class="key1">6</td>
				</tr>
				<tr>
					<td class="key1">7</td>
					<td class="key1">8</td>
					<td class="key1">9</td>
				</tr>
				<tr>
					<td class="btn1">DEL</td>
					<td class="key1">0</td>
					<td class="btn1">CLR</td>
				</tr>
			</table>
			</div>
		</div>
		
		<?php ActiveForm::end(); ?>
		</div>
		<?php  $this->registerJs("$(document).ready(function(){
			var id =null;
			//$('#keypad').fadeToggle('fast');
			$('input').click(function(){
				//event.stopPropagation();   
			   id = this.id;
			});         
			  
			$('.key1').click(function(){
				
				var numBox = document.getElementById(id);
			   
				if(this.innerHTML == '0'){
					if (numBox.value.length > 0)
						numBox.value = numBox.value + this.innerHTML;
				}
				else
					numBox.value = numBox.value + this.innerHTML;
				
				//event.stopPropagation();
			});
			
			$('.btn1').click(function(){
				if(this.innerHTML == 'DEL'){
					var numBox = document.getElementById(id);
					if(numBox.value.length > 0){
						numBox.value = numBox.value.substring(0, numBox.value.length - 1);
					}
				}
				else{
					document.getElementById(id).value = '';
				}
				
				event.stopPropagation();
			});
		});"); ?>
	</div>
</div>
</div>