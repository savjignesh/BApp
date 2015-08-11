<h2>Print Bill</h2>
<hr>

<table style="width:100%;">
	
	<tr>
		<td>Customer</td>
		<td><?= $model->customer_Id; ?></td>
		<td>Net Amount</td>
		<td><?= $model->net_amount; ?></td>
	</tr>
	<tr>
		<td>Total Items</td>
		<td><?= $model->total_items; ?></td>
		<td>bill_date</td>
		<td><?= $model->bill_date; ?></td>
	</tr>
	<tr>
		<td>Gross Amount</td>
		<td><?= $model->gross_amount; ?></td>
		<td>discount</td>
		<td><?= $model->discount; ?></td>
	</tr>
	<tr>
		<td>Vat</td>
		<td><?= $model->vat; ?></td>
		<td>Tax</td>
		<td><?= $model->tax; ?></td>
	</tr>
</table>
<hr>
<table style="width:100%;">
	
	<tr style="background: #000; color: #fff;">
		<td></td>
		<td>Item</td>
		<td>qty</td>
		<td>price</td>
	</tr>
	<?php $i=1; ?>
	<?php foreach ($data as $value) {
		
		echo '<tr style="background: #ddd;">';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$value->item_Id.'</td>';
			echo '<td>'.$value->qty.'</td>';
			echo '<td>'.$value->price.'</td>';
		echo '</tr>';
		$i++;
	} ?>
</table>

