<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use fedemotta\datatables\DataTables;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerpaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parties Payment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customerpay-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Parties Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'clientOptions' => [
            "paging"=>false,
           
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'customerpay_ID',
            [
                'attribute'=>'customer.customer_name',
                'contentOptions' =>['class' => 'update'],
                'value' => 'customer.customer_name'
            ],
            [
                'attribute'=>'payment_mode',
                'contentOptions' =>['class' => 'update'],
                'value' => 'payment_mode'
            ],
            'Amount',
            'payment_date',
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
                    var id = $(this).closest('tr').data('key');
                    if(e.target == this)
                        location.href = '" . Url::to(['update']) . "?id=' + id;
                });

            ");
            ?>

</div>
