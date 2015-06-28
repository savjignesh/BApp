<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Billdetail */

$this->title = 'Update Billdetail: ' . ' ' . $model->billdetail_ID;
$this->params['breadcrumbs'][] = ['label' => 'Billdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->billdetail_ID, 'url' => ['view', 'id' => $model->billdetail_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="billdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
