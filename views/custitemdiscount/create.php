<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CustItemDiscount */

$this->title = 'Create Cust Item Discount';
$this->params['breadcrumbs'][] = ['label' => 'Cust Item Discounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-item-discount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
