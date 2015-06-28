<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'rowOptions'   => function ($model, $key, $index, $grid) {
			return ['data-id' => $model->bill_ID];
		},

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bill_ID',
            'customer_Id',
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
	?>
</div>
