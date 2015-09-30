<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Customerpay */

$this->title = 'Create Payment';
$this->params['breadcrumbs'][] = ['label' => 'Parties Payment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customerpay-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
