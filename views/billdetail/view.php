<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Billdetail */

$this->title = $model->billdetail_ID;
$this->params['breadcrumbs'][] = ['label' => 'Billdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->billdetail_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->billdetail_ID], [
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
            'billdetail_ID',
            'bill_Id',
            'item_Id',
            'qty',
            'price',
            'discount',
            'vat',
            'tax',
            'created_Id',
            'created_time',
            'updated_Id',
            'updated_time',
        ],
    ]) ?>

</div>
