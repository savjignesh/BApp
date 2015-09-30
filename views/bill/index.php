<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Bill;
use app\models\BillSearch;
use fedemotta\datatables\DataTables;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">
	 <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            

            <td><?=  DatePicker::widget([
                   
                    'name' => 'min',
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
                        'id' => 'min'
                    ]
                    
                ]); 
                ?></td>
        <td>&nbsp;<td>
            <td><?=  DatePicker::widget([
                   
                    'name' => 'max',
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
                        'id' => 'max'
                    ]
                    
                ]); 
                ?></td>
        </tr>
    </tbody></table>
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'clientOptions' => [
		    "paging"=>false,
		   
		],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
				'attribute'=>'bill_ID',
				'contentOptions' =>['class' => 'update'],
				'value' => 'bill_ID'
			],
			[
				'attribute'=>'customer.customer_name',
				'contentOptions' =>['class' => 'update'],
				'value' => 'customer.customer_name'
			],
            'bill_date',
            //'net_amount',
            'gross_amount',

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
    ]);?>

   <?php
    $this->registerJs("
       $.fn.dataTableExt.afnFiltering.push(
                function( oSettings, aData, iDataIndex ) {
                    
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear()+10;
                    
                    if (dd<10)
                    dd = '0'+dd;
                    
                    if (mm<10)
                    mm = '0'+mm;
                    
                    today = dd+'-'+mm+'-'+yyyy;
                    
                    
                    var iMin_temp = $('#min').val();
                    if (iMin_temp == '') {
                      iMin_temp = '01-01-1980';
                    }
                    
                    var iMax_temp = $('#max').val();
                    if (iMax_temp == '') {
                      iMax_temp = today;
                    }
                    //console.log(iMin_temp+iMax_temp);
                    var arr_min = iMin_temp.split('-');
                    var arr_max = iMax_temp.split('-');
                    var arr_date = aData[3].split('-');
          
                    var iMin = new Date(arr_min[2], arr_min[1], arr_min[0], 0, 0, 0, 0)
                    var iMax = new Date(arr_max[2], arr_max[1], arr_max[0], 0, 0, 0, 0)
                    var iDate = new Date(arr_date[2], arr_date[1], arr_date[0], 0, 0, 0, 0)
                    
                    if ( iMin == '' && iMax == '' )
                    {
                        return true;
                        
                    }
                    else if ( iMin == '' && iDate < iMax )
                    {
                        return true;
                        
                    }
                    else if ( iMin <= iDate && '' == iMax )
                    {
                        return true;
                    }
                    else if ( iMin <= iDate && iDate <= iMax )
                    {
                        return true;
                        
                    }
                    return false;
                    }
                
            );
       

        $(document).ready(function() {
          

            var oTable=$('#datatables_w0').DataTable();

            /* Add event listeners to the two date-range filtering inputs */

            $('#min').change( function() { if(this.value != ''){ oTable.draw(); } } );
            $('#max').change( function() { if(this.value != ''){ oTable.draw(); } } );

            $('#min').keyup(function() { if(this.value != ''){ oTable.draw(); } });
            $('#max').keyup( function() { if(this.value != ''){ oTable.draw(); } } );
            
        } ); 
		$('td.update').click(function (e) {
		        var id = $(this).closest('tr').data('key');
		        if(e.target == this)
		            location.href = '" . Url::to(['update']) . "?id=' + id;
        });");
      ?>

    <?php /* GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'rowOptions'   => function ($model, $key, $index, $grid) {
			return ['data-id' => $model->bill_ID];
		},

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bill_ID',
            'customer.customer_name',
            'bill_date',
            'net_amount',
            'gross_amount',
            // 'vat',
            // 'tax',
            // 'discount',
            // 'total_items',
            // 'is_deleted',
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
	<?php
	$this->registerJs("

		$('td').click(function (e) {
			var id = $(this).closest('tr').data('id');
			if(e.target == this)
				location.href = '" . Url::to(['update']) . "?id=' + id;
		});

	");
	 */ ?>
</div>
