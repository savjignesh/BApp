<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customer_ID',
            'customer_name',
            'gender',
            'home_phone',
            'mobile1',
            // 'mobile2',
            // 'customer_email:email',
            // 'address1',
            // 'address2',
            // 'city',
            // 'current_balance',
            // 'marketing_person_name',
            // 'marketing_persion_contact',
            // 'accounting_persion_name',
            // 'accounting_persion_contact',
            // 'dnd_sms',
            // 'dnd_call',
            // 'dnd_email:email',
            // 'id_deleted',
            // 'created_Id',
            // 'created_time',
            // 'updated_Id',
            // 'updated_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
