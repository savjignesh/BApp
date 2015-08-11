<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;
use app\models\Test;
use app\models\TestSearch;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="test-index">
    <?php
        $searchModel = new TestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>
 
    <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            

            <td><?=  DatePicker::widget([
                   
                    'name' => 'min',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'readonly' => true,
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ],
                    'options' => [
                        'class' => 'form-control',
                        'id' => 'min'
                    ]
                    
                ]); 
                ?></td>
        <td>&nbsp;<td>
            <td><?=  DatePicker::widget([
                   
                    'name' => 'max',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'readonly' => true,
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ],
                    'options' => [
                        'class' => 'form-control',
                        'id' => 'max'
                    ]
                    
                ]); 
                ?></td>
        </tr>
    </tbody></table>
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d-m-Y']
            ],     
           // 'date("d-m-Y", strtotime($data->created_at))',
           // 'created_at',
            //columns

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $this->registerJs("
       $.fn.dataTableExt.afnFiltering.push(
                function( oSettings, aData, iDataIndex ) {
                    
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear()+10;
                    
                    if (dd<10)
                    dd = '0'+dd;
                    
                    if (mm<10)
                    mm = '0'+mm;
                    
                    today = dd+'-'+mm+'-'+yyyy;
                    
                    
                    var iMin_temp = $('#min').val();
                    if (iMin_temp == '') {
                      iMin_temp = '01-01-1980';
                    }
                    
                    var iMax_temp = $('#max').val();
                    if (iMax_temp == '') {
                      iMax_temp = today;
                    }
                    //console.log(iMin_temp+iMax_temp);
                    var arr_min = iMin_temp.split('-');
                    var arr_max = iMax_temp.split('-');
                    var arr_date = aData[3].split('-');
          
                    var iMin = new Date(arr_min[2], arr_min[1], arr_min[0], 0, 0, 0, 0)
                    var iMax = new Date(arr_max[2], arr_max[1], arr_max[0], 0, 0, 0, 0)
                    var iDate = new Date(arr_date[2], arr_date[1], arr_date[0], 0, 0, 0, 0)
                    console.log(iDate);
                     console.log(iMin+iMax);
                    if ( iMin == '' && iMax == '' )
                    {
                        return true;
                        
                    }
                    else if ( iMin == '' && iDate < iMax )
                    {
                        return true;
                        
                    }
                    else if ( iMin <= iDate && '' == iMax )
                    {
                        return true;
                    }
                    else if ( iMin <= iDate && iDate <= iMax )
                    {
                        return true;
                        
                    }
                    return false;
                    }
                
            );
       

        $(document).ready(function() {
          

            var oTable=$('#datatables_w0').DataTable();

            /* Add event listeners to the two date-range filtering inputs */

            $('#min').change( function() { if(this.value != ''){ oTable.draw(); } } );
            $('#max').change( function() { if(this.value != ''){ oTable.draw(); } } );

            $('#min').keyup(function() { if(this.value != ''){ oTable.draw(); } });
            $('#max').keyup( function() { if(this.value != ''){ oTable.draw(); } } );
            
        } ); ");
      ?>

   <!-- Render create form -->    
    <?php // $this->render('_form', [
        //'model' => $model,
    //]) 
echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Privacy Statement', ['/test/report'], [
    'class'=>'btn btn-danger', 
    'target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Will open the generated PDF file in a new window'
]);
    ?>

    
	
</div>
