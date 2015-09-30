<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customerpay */

$this->title = 'Update Parties Payment: ' . ' ' . $model->customerpay_ID;
$this->params['breadcrumbs'][] = ['label' => 'Parties Payment', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customerpay_ID, 'url' => ['view', 'id' => $model->customerpay_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customerpay-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
