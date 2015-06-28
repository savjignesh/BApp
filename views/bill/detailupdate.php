<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bill */

$this->title = 'Bill: ' . ' ' . $model->bill_ID;
$this->params['breadcrumbs'][] = ['label' => 'Bills', 'url' => ['index']];
$this->params['breadcrumbs'][] =  $model->bill_ID;
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('detail', [
        'model' => $model
    ]) ?>

</div>
