<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Billdetail */

$this->title = 'Create Billdetail';
$this->params['breadcrumbs'][] = ['label' => 'Billdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billdetail-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
