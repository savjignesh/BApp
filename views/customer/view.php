<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->customer_ID;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->customer_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->customer_ID], [
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
            'customer_ID',
            'customer_name',
            'gender',
            'home_phone',
            'mobile1',
            'mobile2',
            'customer_email:email',
            'address1',
            'address2',
            'city',
            'current_balance',
            'marketing_person_name',
            'marketing_persion_contact',
            'accounting_persion_name',
            'accounting_persion_contact',
            'dnd_sms',
            'dnd_call',
            'dnd_email:email',
            'created_Id',
            'created_time',
            'updated_Id',
            'updated_time',
        ],
    ]) ?>

</div>
