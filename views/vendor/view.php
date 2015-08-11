<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vendor */

$this->title = $model->vendor_ID;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vendor_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vendor_ID], [
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
            'vendor_ID',
            'vendor_name',
            'vendor_email:email',
            'city',
            'address1',
            'address2',
            'current_balance',
            'gender',
            'home_phone',
            'mobile1',
            'mobile2',
            'dnd_call',
            'dnd_email:email',
            'dnd_sms',
            'accounting_persion_name',
            'accounting_persion_contact',
            'marketing_person_name',
            'marketing_persion_contact',
            'is_deleted',
            'created_Id',
            'created_time',
            'updated_Id',
            'updated_time',
        ],
    ]) ?>

</div>
