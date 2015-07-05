<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php \yii\widgets\Pjax::begin(['id' => 'countries', 'enablePushState' => false]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'options' => [
			'id' => 'cool',
		],
		'rowOptions'   => function ($model, $key, $index, $grid) {
			return ['data-id' => $model->item_ID];
		},

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             [
				'attribute' => 'image',
				'format' => 'html',
				'label' => 'Image',
				'filter' =>false,
				'contentOptions' =>['class' => 'update'],
				'value' => function ($data) {
					return Html::img(Yii::$app->homeUrl.'/' . $data['image'],
						['width' => '60px']);
				},
			],
			[
				'attribute'=>'item_name',
				'contentOptions' =>['class' => 'update'],
				'value' => 'item_name'
			],
           // 'item_name',
            'description',
            
            'purchase_price',
            // 'sales_price',
            // 'item_cat_Id',
            // 'Item_role',
            // 'item_stock',
            // 'item_uom',
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

    $('td.update').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
            location.href = '" . Url::to(['update']) . "?id=' + id;
    });

");
?>
<?php \yii\widgets\Pjax::end(); ?>
</div>
