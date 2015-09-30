<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customerpay */

$this->title = $model->customerpay_ID;
$this->params['breadcrumbs'][] = ['label' => 'Parties Payment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customerpay-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->customerpay_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->customerpay_ID], [
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
            'customerpay_ID',
            'customer_Id',
            'payment_mode',
            'Amount',
            'payment_date',
        ],
    ]) ?>

</div>
