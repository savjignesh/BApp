<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vendor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vendor_ID',
            'vendor_name',
            'vendor_email:email',
            'gender',
            'home_phone',
            'mobile1',
            'city',
            //'address1',
            // 'address2',
            // 'current_balance',
            // 'gender',
            // 'home_phone',
            // 'mobile1',
            // 'mobile2',
            // 'dnd_call',
            // 'dnd_email:email',
            // 'dnd_sms',
            // 'accounting_persion_name',
            // 'accounting_persion_contact',
            // 'marketing_person_name',
            // 'marketing_persion_contact',
            // 'is_deleted',
            // 'created_Id',
            // 'created_time',
            // 'updated_Id',
            // 'updated_time',

           [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a(
                            '<span class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></span>',
                            $url, 
                            [
                                'title' => 'Download',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    
                    'delete' => function ($url) {
                        return Html::a(
                            '<span class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></span>',
                            $url, 
                            [
                                'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
                                'data-method' => 'post',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>
    <?php
        $this->registerJs("

            $('td.update').click(function (e) {
                var id = $(this).closest('tr').data('id');
                if(e.target == this)
                    location.href = '" . Url::to(['update']) . "?id=' + id;
            });

        ");
    ?>

</div>
