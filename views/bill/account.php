<?php
use app\models\Customer;

?>
<h2>Cash Account</h2>
<hr>

<table style="width:100%;">
	
	
</table>
<hr>
<table style="width:100%;">
	
	<tr>
		<td>Customer Account</td>
		<td>Amount</td>
		<td>Vendor Account</td>
		<td>Amount</td>
	</tr>
	<?php 
	$i=1; 
	$lefttotal = 0;
	$rightotal = 0;
	?>
	<?php foreach ($model as $value) {
		
		echo '<tr style="background: #ddd;">';
			echo '<td>'.Customer::find()->where('customer_ID = :id', [':id' => $value->credit_ac_Id])->one()->customer_name.'</td>';
			echo '<td>'.$value->credit_amount.'</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
		echo '</tr>';
		$i++;
		$lefttotal = $lefttotal + $value->credit_amount;
		$rightotal = $rightotal + $value->credit_amount;
	}
		echo '<tr>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
		echo '</tr>'; 

		echo '<tr style="background: #ddd;">';
			echo '<td>Total</td>';
			echo '<td>'.$lefttotal.'</td>';
			echo '<td>Total</td>';
			echo '<td>'.$rightotal.'</td>';
		echo '</tr>';
		?>


</table>

