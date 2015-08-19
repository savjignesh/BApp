<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use fedemotta\datatables\DataTables;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<?php //\yii\widgets\Pjax::begin(['id' => 'countries', 'enablePushState' => false]) ?>
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'clientOptions' => [
		    "paging"=>false,
		   
		],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
				'attribute'=>'customer_ID',
				'contentOptions' =>['class' => 'update'],
				'value' => 'customer_ID'
			],
			[
				'attribute'=>'customer_name',
				'contentOptions' =>['class' => 'update'],
				'value' => 'customer_name'
			],
            'home_phone',
            'mobile1',
            // 'mobile2',
            // 'customer_email:email',
            // 'address1',
            // 'address2',
             'city',
            // 'current_balance',
            // 'marketing_person_name',
            // 'marketing_persion_contact',
            // 'accounting_persion_name',
            // 'accounting_persion_contact',
            // 'dnd_sms',
            // 'dnd_call',
            // 'dnd_email:email',
            // 'is_deleted',
            // 'created_Id',
            // 'created_time',
            // 'updated_Id',
            // 'updated_time',
            //['class' => 'yii\grid\ActionColumn'],
            [
	             'label'=>'',
	             'format'=>'raw',
	             'value' => function($data){
	                 return Html::a('<span class="btn btn-primary"><span class="glyphicon glyphicon-star-empty"></span></span>', ['cdiscount/index', 'cid'=>$data->customer_ID], ['title' => 'Go']); 
	             }
			],
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

				$('td.update').click(function (e) {
					var id = $(this).closest('tr').data('key');
					if(e.target == this)
						location.href = '" . Url::to(['update']) . "?id=' + id;
				});

			");
			?>
	<?php //\yii\widgets\Pjax::end(); ?>
</div>
