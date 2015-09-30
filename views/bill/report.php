<?php
use app\models\Item;
use app\models\Customer;
?>
<div style="text-align:center; border-bottom: 1px dashed #000; margin: 10px 0px;"><h4 ><p>ORDER/ESTIMATE</p></h4></div>

<p style="text-align:center;">
	<< DC 09/015 >><br />
	(DUPLICATE)
</p>
<table style="width:100%;">
	
	<tr>
		<td colspan="3"><p>Party..: <?= Customer::find()->where('customer_ID = :id', [':id' => $model->customer_Id])->one()->customer_name; ?></p></td>
	</tr>
	<tr>
		<td><p>Bill NO: <?= $model->bill_ID; ?></p></td>
		<td><p>Dt. <?= $model->bill_date; ?></p></td>
		<td><p>Time: <?= date("H : s"); ?></p></td>
		
	</tr>
</table>
<hr>
<table style="width:100%;" >
	
	<tr style="">
		<td style="border: 1px dashed #000; padding:5px;"><p>Description</p></td>
		<td style="border: 1px dashed #000; padding:5px;"><p>Qty:</p></td>
		<td style="border: 1px dashed #000; padding:5px;"><p>Rate</p></td>
		<td style="border: 1px dashed #000; padding:5px;"><p>Amount</p></td>
	</tr>
	<?php $i     = 1;
		  $total = 0;
	 ?>
	<?php foreach ($data as $value) {
		
		echo '<tr>';
			echo '<td style="border: 1px dashed #000; padding:5px;">'.Item::find()->where('item_ID = :Iid', [':Iid' => $value->item_Id])->one()->item_name.'</td>';
			echo '<td style="border: 1px dashed #000; padding:5px;">'.$value->qty.'</td>';
			echo '<td style="border: 1px dashed #000; padding:5px;">'.$value->price.'</td>';
			echo '<td style="border: 1px dashed #000; padding:5px; text-align:right;">'.number_format((float)$value->final_price, 2, '.', '').'</td>';
		echo '</tr>';
		$i++;
		$total = $total + $value->final_price;
	} 

		echo '<tr>';
			echo '<td colspan="3" style="border: 1px dashed #000; padding:5px; text-align:center;"><p>Total Amount : </p></td>';
			echo '<td style="border: 1px dashed #000; padding:5px; text-align:right;">'.number_format((float)$total, 2, '.', '').'</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<td colspan="3" style="border: 1px dashed #000; padding:5px; text-align:center;"><p>N E T &nbsp; A M O U N T : </p></td>';
			echo '<td style="border: 1px dashed #000; padding:5px; text-align:right;">'.number_format((float)$total, 2, '.', '').'</td>';
		echo '</tr>';
	?>
</table>
<p style="margin:10px 1px;"> SUBJECT TO AHMEDABAD JURISDICTION ONLY.</p>
<p style="margin:10px 1px;"> Receiver's Signature : _______________________</p>
<p style="margin:10px 1px;"> For , ORDER/ESTIMATE </p>
<p style="margin:10px 1px;"> Authorised Signatory </p>

