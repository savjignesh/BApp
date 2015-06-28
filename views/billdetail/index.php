<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Item;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BilldetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Billdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Billdetail', ['value'=>Url::to(['create','bid'=>2]), 'class' => 'btn btn-success','id'=>'modelButton']) ?>
    </p>
	
	<?php
		Modal::begin([
			'header' => '<h2>Insert Item Detail</h2>',
			'id' => 'model'
		]);
		echo '<div id="modelvalue"></div>';
		Modal::end();
	?>
	<?php Pjax::begin(['id' => 'countries']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'billdetail_ID',
            'bill_Id',
            'item_Id',
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
	<div class="row">
		<?php
		$items = Item::find()
					//->where("reg_date > '2014-01-01' and status=1")
					->all();
		foreach($items as $item){
		
			echo Html::button($item->item_name, ['value'=>Url::to(['create','bid'=>$item->item_ID]), 'class' => 'btn btn-success','class'=>'modelButton']);
		}
		?>	
		
	</div>
</div>
