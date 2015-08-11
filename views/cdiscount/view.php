<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CustItemDiscount */

$this->title = $model->cust_item_discount_ID;
$this->params['breadcrumbs'][] = ['label' => 'Cust Item Discounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-item-discount-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cust_item_discount_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cust_item_discount_ID], [
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
            'item_Id',
            'customer_Id',
            'cust_item_discount_ID',
            'discount',
            'created_Id',
            'created_time',
            'updated_Id',
            'updated_time',
        ],
    ]) ?>

</div>
