<?php
use app\models\Customer;
use app\models\Vendor;
?>
<h2>Cash Account</h2>
<hr>

<table style="width:100%;">
	
	
</table>
<hr>


<table style="width:100%;">	
	<tr >
		<td style="border-bottom: solid 1px #000;">Date</td>
		<td style="border-bottom: solid 1px #000;">Customer Account</td>
		<td style="border-bottom: solid 1px #000;">Amount</td>
		
		<td style="border-bottom: solid 1px #000;">Vendor Account</td>
		<td style="border-bottom: solid 1px #000;">Amount</td>
	</tr>
	<?php 
	$i=1; 
	$lefttotal = 0;
	$rightotal = 0;
	?>
	<?php foreach ($model as $value) {
		
		echo '<tr >';
			echo '<td>'.$value->credit_date.'</td>';
			echo '<td>'.Customer::find()->where('customer_ID = :id', [':id' => $value->credit_ac_Id])->one()->customer_name.'</td>';
			echo '<td style="text-align:right;">'.$value->credit_amount.'</td>';

			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
		echo '</tr>';
		$i++;
		$lefttotal = $lefttotal + $value->credit_amount;
			
	}
	foreach ($model1 as $value1) {
		
		echo '<tr >';
			echo '<td>'.$value1->debit_date.'</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>'.Vendor::find()->where('vendor_ID = :id', [':id' => $value1->debit_ac_Id])->one()->vendor_name.'</td>';
			echo '<td style="text-align:right;">'.$value1->debit_amount.'</td>';
			
		echo '</tr>';
		$i++;
		$rightotal = $rightotal + $value1->debit_amount;
	}
		echo '<tr>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
		echo '</tr>'; 

		echo '<tr>';
			echo '<td>&nbsp;</td>';
			echo '<td>Total</td>';
			echo '<td style="border-top: solid 1px #000; text-align:right;">'.$lefttotal.'</td>';
			echo '<td>Total</td>';
			echo '<td style="border-top: solid 1px #000; text-align:right;">'.$rightotal.'</td>';
		echo '</tr>';
		?>


</table>

