<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

use app\models\User;

use fedemotta\datatables\DataTables;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<?php \yii\widgets\Pjax::begin(['id' => 'countries', 'enablePushState' => false]) ?>
     <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'clientOptions' => [
		    "paging"=>false,
		   
		],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'category_ID',
			[
				'attribute'=>'category_name',
				'contentOptions' =>['class' => 'update'],
				'value' => 'category_name'
			],
			
            //'id_deleted',
            [
                'attribute' => 'created_time',
                'format' => ['date', 'php:d-m-Y']
            ],   
           
            [
                'attribute' => 'updated_time',
                'format' => ['date', 'php:d-m-Y']
            ],   

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

		$('td.update').click(function (e) {
			var id = $(this).closest('tr').data('id');
			if(e.target == this)
				location.href = '" . Url::to(['update']) . "?id=' + id;
		});

	");
	?>
	<?php \yii\widgets\Pjax::end(); ?>
</div>
