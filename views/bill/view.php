<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Item;
/* @var $this yii\web\View */
/* @var $model app\models\Bill */

$this->title = $model->bill_ID;
$this->params['breadcrumbs'][] = ['label' => 'Bills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bill_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bill_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bill_ID',
            'customer_Id',
            'bill_date',
            'net_amount',
            'gross_amount',
            'vat',
            'tax',
            'discount',
            'total_items',
        ],
    ]) ?>
	<?php Pjax::begin(['id' => 'countries']) ?>
	<?= GridView::widget([
        'dataProvider' => $billdata,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'billdetail_ID',
            'bill_Id',
            [
			 'attribute' => 'item_name',
			 'value' => 'item.item_name'
			 ],
            'qty',
            'price',
			 
            // 'discount',
            // 'vat',
            // 'tax',
            // 'created_Id',
            // 'created_time',
            // 'updated_Id',
            // 'updated_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<?php Pjax::end() ?>
	<!--
	<div class="row">
		<div class="col-md-12">
		
		<?php /*
		$items = Item::find()
					//->where("reg_date > '2014-01-01' and status=1")
					->all();
		
		foreach($items as $item)
		{
			if($item->image!=null){
				$img= '<img src="'.Yii::$app->homeUrl.'/'.$item->image.'" width="166px" height="150px"><br /><b>'.$item->item_name.'</b>';
			}else{
				$img= '<img src="'.Yii::$app->homeUrl.'uploads/1.jpg" width="166px" height="150px"><br /><b>'.$item->item_name.'</b>';
			}
			
			echo Html::button($img, ['value'=>Url::to(['detail','bid'=>$item->item_ID,'id'=>$model->bill_ID]), 'class' => 'btn btn-success','class'=>'modelButton']);
		} */
		?>	
		</div>
	</div>
	<?php /*
		Modal::begin([
			'header' => '<h2>Insert Item Detail</h2>',
			'id' => 'model'
		]);
		echo '<div id="modelvalue"></div>';
		Modal::end(); */
	?> -->
</div>
