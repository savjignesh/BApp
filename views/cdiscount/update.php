<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustItemDiscount */

$this->title = 'Update Cust Item Discount: ' . ' ' . $model->cust_item_discount_ID;
$this->params['breadcrumbs'][] = ['label' => 'Cust Item Discounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cust_item_discount_ID, 'url' => ['view', 'id' => $model->cust_item_discount_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cust-item-discount-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
