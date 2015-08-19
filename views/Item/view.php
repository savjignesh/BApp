<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model->item_ID;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->item_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->item_ID], [
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
            'item_code',
            'item_name',
            'description',
            [
				'attribute'=>'photo',
				'value'=>Yii::$app->homeUrl.$model->image,
				'format' => ['image',['width'=>'100','height'=>'100']],
			],
            'purchase_price',
            'sales_price',
            'item_cat_Id',
            'Item_role',
            'item_stock',
            'item_uom',
            'vat',
            'tax',
          //  'is_deleted',
            'created_Id',
            'created_time',
            'updated_Id',
            'updated_time',
        ],
    ]) ?>

</div>
