<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">
    <div class="row">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    	<?php //$form->errorSummary($model); ?>
        <div class=" col-md-6 col-sm-6">
            <?= $form->field($model, 'item_name')->textInput(['maxlength' => 100]) ?>

            <?= $form->field($model, 'description')->textArea(['rows' => 6]) ?>

            <?= $form->field($model, 'file')->fileInput(); ?>

            <?= $form->field($model, 'purchase_price')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'sales_price')->textInput(['maxlength' => 50]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

    	</div>
        <div class=" col-md-6 col-sm-6">
        	<?php $categories=Category::find()->all();

        		  $listData=ArrayHelper::map($categories,'category_ID','category_name');
        	?>
        	<?= $form->field($model, 'item_cat_Id')->dropDownList($listData,['prompt'=>'Select...']); ?>
        	

            <?= $form->field($model, 'Item_role')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'item_stock')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'item_uom')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'vat')->textInput(['maxlength' => 50]) ?>
            <?= $form->field($model, 'tax')->textInput(['maxlength' => 50]) ?>
        </div>
    	<!--<?php //$form->field($model, 'is_deleted')->dropDownList(['0' => 'No', '1' => 'Yes']); ?> -->

        
        <?php ActiveForm::end(); ?>
    </div>
</div>
