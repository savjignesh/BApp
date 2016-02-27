<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use fedemotta\datatables\DataTables;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<?= \nullref\datatable\DataTable::widget([
    'data' => $dataProvider->getModels(),
    'columns' => [
        'item_name'
    ],
]) 

?>
   </div>