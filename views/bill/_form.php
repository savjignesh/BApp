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
		<div id="customer">dD</div>
		<?php
			Modal::begin([
				'header' => '<h2>Insert Item Detail</h2>',
				'id' => 'customer-model'
			]);
			echo '<div id="customervalue">fff</div>';
			Modal::end();
		?>
		<div class="row">
			<div class=" col-md-6 col-sm-6">
			
				<?php //$form->field($model, 'customer_Id')->textInput() ?>
				<?= $form->field($model, 'customer_Id')->widget(Select2::classname(), [
					'data' => ArrayHelper::map(Customer::find()->all(),'customer_ID','customer_name'),
					'language' => 'en',
					'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
					'pluginOptions' => [
						'tags' => true,
						'maximumInputLength' => 10
					],
				]);
				?>
				<?php //$form->field($model, 'net_amount')->textInput(['maxlength' => 50]) ?>

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
					'value' => date('d-M-Y'),
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
		<table class="table table-striped table-bordered detail-view">
			<tbody>
			<tr><th>Total Items</th><td><?php echo $model->total_items; ?></td><th>Discount</th><td><?php echo $model->discount; ?></td></tr>
			<tr><th>Net Amount</th><td><?php echo $model->net_amount; ?></td><th>Gross Amount</th><td><?php echo $model->gross_amount; ?></td></tr>
			<tr><th>Vat</th><td><?php echo $model->vat; ?></td><th>Tax</th><td><?php echo $model->tax; ?></td></tr>
			</tbody>
		</table>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
		<?php ActiveForm::end(); ?>
		<div class="row">
			<?php Pjax::begin(['id' => 'countries']) ?>
				<?= GridView::widget([
					'dataProvider' => $billdata,
					'rowOptions'   => function ($model, $key, $index, $grid) {
						return ['data-id' => $model->billdetail_ID];
					},
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],

						//'billdetail_ID',
						//'bill_Id',
						 [
							'attribute'=>'item_name',
							'contentOptions' =>['class' => 'modelButton1'],
							'value' => 'item.item_name'
						],
						'qty',
						'price',
					    'discount',
						'vat',
						'tax',
						// 'created_Id',
						// 'created_time',
						// 'updated_Id',
						// 'updated_time',

						//['class' => 'yii\grid\ActionColumn'],
						[
							'class' => 'yii\grid\ActionColumn',
							'template' => '{view}',
							'buttons' => [
								'view' => function ($url) {
									return Html::a(
										'<span class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></span>',
										$url, 
										[
											'title' => 'Download',
											'data-pjax' => '0',
										]
									);
								},
								
							],
						],
						[
							'class' => 'yii\grid\ActionColumn',
							'template' => '{delete}',
							'buttons' => [
								
								'delete' => function ($url) {
									return Html::a(
										'<span class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></span>',
										$url, 
										[
											'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
											'data-method' => 'post',
										]
									);
								},
							],
						],
					],
				]); ?>
			<?php Pjax::end() ?>
			<?php
			$this->registerJs("

				$('td.modelButton1').click(function (e) {
					var id = $(this).closest('tr').data('id');
					if(e.target == this){
						location.href = '" . Url::to(['dupdate']) . "?id=' + id;

					}
				});

			");
			?>
		</div>
		</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			
				<?php
				$items = Item::find()
							//->where("reg_date > '2014-01-01' and status=1")
							->all();
				
				foreach($items as $item)
				{
					if($item->image!=null){
						$img= '<img src="'.Yii::$app->homeUrl.'/'.$item->image.'" width="90px" height="90px"><br /><b>'.$item->item_name.'</b>';
					}else{
						$img= '<img src="'.Yii::$app->homeUrl.'uploads/1.jpg" width="90px" height="90px"><br /><b>'.$item->item_name.'</b>';
					}
					echo Html::button($img, ['value'=>Url::to(['detail','bid'=>$item->item_ID,'id'=>$model->bill_ID, 'price'=>$item->sales_price]), 'class'=>'modelButton']);
				}
				?>	
			</div>
		</div>
		
		<?php
			Modal::begin([
				'header' => '<h2>Insert Item Detail</h2>',
				'id' => 'model'
			]);
			echo '<div id="modelvalue"></div>';
			Modal::end();
		?>
	
    

</div>
