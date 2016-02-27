<?php
use app\models\Customer;
use app\models\Vendor;
?>
<div style=" margin: 0px 0px;"><p>Company : ORDER/ESTIMATE</p></div>
<div style=" margin: 0px 0px;"><p>Report  &nbsp; &nbsp; &nbsp;: <?php if(!isset($party_name)){ echo 'CASH'; }else{ echo 'PARTY'; } ?> LEDGER * *</p></div>
<?php if(isset($party_name)){ echo '<div style=" margin: 0px 0px;"><p>Party  &nbsp; &nbsp; &nbsp; &nbsp; : '.$party_name; } ?>
<div style="margin: 0px 0px;"><p>Period &nbsp; &nbsp; &nbsp;: <?php if(!isset($sdate)){ echo '01/04/'.date("Y").' to '.date("d/m/Y"); }else{ echo date("d/m/Y", strtotime($sdate)).' to '.date("d/m/Y", strtotime($edate)); } ?></p></div>

<table style="width:100%; margin: 15px 0px;">
	<tr style="border-bottom: solid 1px #000; border-top: solid 1px #000;  " >

		<td style="border-bottom: solid 1px #000; border-right: solid 1px #000; padding:5px;"><p>Account name</p></td>
		<td style="border-bottom: solid 1px #000; border-right: solid 1px #000; padding:5px;"><p>DATE (dd/mm/yyyy)</p></td>
		<td style="border-bottom: solid 1px #000; border-right: solid 1px #000; padding:5px;"><p>Debit Amount</p></td>


		<td style="border-bottom: solid 1px #000; border-right: solid 1px #000; padding:5px;"><p>Credit Amount</p></td>
	</tr>
	<?php
	$i=1;
	$lefttotal = 0;
	$rightotal = 0;
	//for opening balance
	//echo $opening;
	    if($opening < 0){
	    	$plus = -1;
	    	echo '<tr>';
				echo '<td style="padding:5px; border-right: solid 1px #000;"><p>Opening Balance</p></td>';
				echo '<td style="border-right: solid 1px #000;">&nbsp;</td>';
				echo '<td style="padding:5px; border-right: solid 1px #000;">&nbsp;</td>';
				echo '<td style="padding:5px;  text-align:right; border-right: solid 1px #000;">'.$opening * $plus.'</td>';
			echo '</tr>';

			$rightotal = $rightotal + $opening * $plus;
	    }else{
	    	echo '<tr>';
				echo '<td style="padding:5px; border-right: solid 1px #000;"><p>Opening Balance</p></td>';
				echo '<td style="border-right: solid 1px #000;">&nbsp;</td>';
				echo '<td style="padding:5px;  border-right: solid 1px #000; text-align:right;">'.$opening.'</td>';
				echo '<td style="padding:5px; border-right: solid 1px #000; width:10px;">&nbsp;</td>';
			echo '</tr>';
			$lefttotal = $lefttotal + $opening;
	    }
	?>
	<?php foreach ($model as $value) {

		if($value->credit_debit == 0){
			echo '<tr >';
				echo '<td style="padding:5px; border-right: solid 1px #000;"><p>'.Customer::find()->where('customer_ID = :id', [':id' => $value->credit_ac_Id])->one()->customer_name.'<br />(for bill payment of '.$value->credit_bill_Id.')</p></td>';
				echo '<td style="padding:5px; border-right: solid 1px #000; width:10px;"><p>'.date("d/m/Y", strtotime($value->credit_date)).'</p></td>';
				echo '<td style="text-align:right; border-right: solid 1px #000; padding:5px; width:10px;"><p>'.$value->credit_amount.'</p></td>';


				echo '<td style="padding:5px; border-right: solid 1px #000; width:10px;">&nbsp;</td>';
			echo '</tr>';
			$lefttotal = $lefttotal + $value->credit_amount;
		}else{
			echo '<tr >';
				echo '<td style="padding:5px; border-right: solid 1px #000;"><p>'.Customer::find()->where('customer_ID = :id', [':id' => $value->credit_ac_Id])->one()->customer_name.'<br />(for bill payment of '.$value->credit_bill_Id.')</p></td>';
				echo '<td style="padding:5px; border-right: solid 1px #000;"><p>'.date("d-m-Y", strtotime($value->credit_date)).'</p></td>';
				echo '<td style="border-right: solid 1px #000;">&nbsp;</td>';

				echo '<td style="text-align:right; border-right: solid 1px #000; padding:5px; width:10px;"><p>'.$value->credit_amount.'</p></td>';

			echo '</tr>';
			$rightotal = $rightotal + $value->credit_amount;
		}
		$i++;

	}

		$netamount = $rightotal-$lefttotal;

		echo '<tr>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
		echo '</tr>';

		echo '<tr>';
			echo '<td style="border-top: solid 1px #000; padding:5px;"><p>TOTAL</p></td>';
			echo '<td style="padding:5px;">&nbsp;</td>';
			echo '<td style="border-top: solid 1px #000; text-align:right; padding:5px;">'.$lefttotal.'</td>';
			echo '<td style="border-top: solid 1px #000; text-align:right; padding:5px;">'.$rightotal.'</td>';
		echo '</tr>';

		if($netamount < 0){
			echo '<tr>';
				echo '<td style=" padding:5px;"><p>NET</p></td>';
				echo '<td style="padding:5px;">&nbsp;</td>';
				echo '<td style=" text-align:right; padding:5px;">&nbsp;</td>';
				echo '<td style=" text-align:right; padding:5px;">'.$netamount*(-1).'</td>';
			echo '</tr>';
		}else{
			echo '<tr>';
				echo '<td style=" padding:5px;"><p>NET</p></td>';
				echo '<td style="padding:5px;">&nbsp;</td>';
				echo '<td style=" text-align:right; padding:5px;">'.$netamount.'</td>';
				echo '<td style="padding:5px;">&nbsp;</td>';
			echo '</tr>';

		}

		?>


</table>
<hr>
