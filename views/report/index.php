<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
?>
<h1>Ledger</h1>
<div class="report-form">
    <div class="row">


		<?php $form = ActiveForm::begin(); ?>
		<?php //echo $form->errorSummary($model); ?>

        <div class=" col-md-4 col-sm-4">

            <?= '<label>Start Date</label>'; ?>
            <?=  DatePicker::widget([
                'model' => $model,
                'name' => 'Report[sdate]',
                'value' => date('d-m-Y'),
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
                    'id' => 'bill-bill_date'
                ]
            ]);
            ?>
            <br />
            <?= $form->field($model, 'type')->dropDownList(['' => '(Select a Type)','5' => 'Parties', '1' => 'Cash']); ?>
            <?php // $form->field($model, 'mode')->dropDownList([ '0' => 'Credit', '1' => 'Debit']); ?>
            <?= $form->field($model, 'customer')->dropDownList(['empty' => '(Select a customer)']); ?>
        </div>
        <div class=" col-md-4 col-sm-4">
            <?= '<label>End Date</label>'; ?>
            <?=  DatePicker::widget([
                'model' => $model,
                'name' => 'Report[edate]',
                'value' => date('d-m-Y'),
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
                    'id' => 'bill-bill_date1'
                ]
            ]);
            ?>
        </div>
        <div class=" col-md-4 col-sm-4">
            &nbsp;
        </div>
        <div class=" col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Create') ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
<?php
$script = <<< JS
$(document).ready(function() {
    $(".field-report-customer").css('display', 'none');
});
$('#report-type').change(function(){
 $.ajax({
       url: 'http://localhost/BApp/web/report/sample',
       type: 'post',
       data: {id: $(this).val()},
       success: function (data) {
        console.log(data);
        if(data!=''){
            $(".field-report-customer").css('display', 'block');
            $( "select#report-customer" ).html( data );
        }else{
            $(".field-report-customer").css('display', 'none');
        }
          
       }
  });
   return false;    
});
//$('#report-type').change(function(){
//    alert(1);
//});

JS;
$this->registerJs($script);
?>
