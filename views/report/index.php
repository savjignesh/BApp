<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
?>
<h1>Laider</h1>
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
            <?= $form->field($model, 'type')->dropDownList(['empty' => '(Select a category)','5' => 'Parties', '1' => 'Cash']); ?>
<?php // $form->field($model, 'mode')->dropDownList([ '0' => 'Credit', '1' => 'Debit']); ?>
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
