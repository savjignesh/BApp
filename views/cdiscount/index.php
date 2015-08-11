<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Item;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CustItemDiscountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cust Item Discounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-item-discount-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Cust Item Discount', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<?php Pjax::begin(['enablePushState' => false]); ?>
	
	<div class="row">
		<div class="col-md-12 col-sm-12">
		<div class="col-md-6 col-sm-6">
			
		<?= DataTables::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'clientOptions' => [
		    "paging"=>false,
		   
		],
       	'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'item_name',
			'sales_price',
			 [
	            'attribute'=>'item_name',
	            'content'=>function($data){
	                return '<input type="text" id="discount-'.$data->item_ID.'" name="row-1-age" value="1">';
	            }
	        ],
			
			[
			 'label'=>'Link',
			 'format'=>'raw',
			 'value' => function($data){
			 	$cid = $_GET['cid'];
				 return Html::a('', ['upvote', 'id'=>$data->item_ID, 'cid'=>$cid], ['title' => 'Go','class' => 'btn-click btn btn-warning glyphicon glyphicon-arrow-right']); 
			 }
			],
		],
    	]);?>
			 <?php
    $this->registerJs("
        $(document).ready(function() {
         
            var table=$('#datatables_w0').DataTable();

		    $('.btn-click').click( function() {
		       
		         var id = $(this).closest('tr').data('key');
		       	 var disc = $('#discount-'+id).val();
				 var link = $(this).attr('href')+'&discount='+disc;
				 $(this).attr('href', link);
		        return true;
		    } );
            
        } ); 
		");
      ?>
		</div>
		<div class="col-md-6 col-sm-6">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					'item_Id',
					 [
			            'attribute'=>'item_Id',
			            'content'=>function($data){
			                return Item::find()->where('item_ID = :itemid', [':itemid' => $data->item_Id])->one()->item_name;
			            }
			        ],

					//'item.iteam_name',
				    //'customer_Id',
					//'cust_item_discount_ID',
					'discount',
					//'created_Id',
					// 'created_time',
					// 'updated_Id',
					// 'updated_time',

					//['class' => 'yii\grid\ActionColumn'],
				
					[
						'class' => 'yii\grid\ActionColumn',
					    'template' => '{delete}',
					    'buttons' => [
					        'delete' => function ($url, $model) {
					            return Html::a('<span class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></span>',
					             $url, 
					             [
					                'title' => Yii::t('app', 'Info'),
					                'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
									'data-method' => 'post',
					            ]);
					        }
					    ],
					    'urlCreator' => function ($action, $model, $key, $index) {
					        if ($action === 'delete') {
					            $url = \yii\helpers\Url::to(['delete','id'=>$model->cust_item_discount_ID, 'cid'=>$model->customer_Id]); // your own url generation logic
					            return $url;
					        }
					    }
					],
				],
			]); ?>
		</div>
	</div>
	</div>
	
	<?php Pjax::end(); ?>
</div>
