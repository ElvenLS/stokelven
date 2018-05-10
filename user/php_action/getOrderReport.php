<?php 
error_reporting(0);
require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM log, products WHERE timestamp >= '$start_date' AND timestamp <= '$end_date' AND log.productid=products.productid ";
	$query = $connect->query($sql);
//echo $sql;
	$table = '
	<h2 align="center"> PT. Wana Arta Manunggal </h2>
	<h3 align="center"> Periode '.$start_date.' - '.$end_date.' </h3>

	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Tanggal</th>
			<th rowspan="2">Product Name</th>
			
			<th colspan="2">Quantity</th>
		</tr>
		<tr>
			<th>Masuk</th>
			<th>Keluar</th>
		</tr>

		<tr>';
			$totalAmount = "";
			$a=1;
			while ($result = $query->fetch_array()) {
//				echo $result[4];
				if($result[3]=="Keluar"){
					$keluar = $result[2] ; //sum();	
					$masuk = 0 ; //sum();	
				}
				if($result[3]=="Masuk"){
					$keluar = 0 ; //sum();	
					$masuk = $result[2] ; //sum();
				}
				
								
				
				
				$awal = $result[7] - $keluar + $masuk;
				$table .= '<tr>
				<td><center>'.$a.'</center></td>
				<td><center>'.$result[4].'</center></td>
				<td><center>'.$result['name'].'</center></td>
				<td><center>'.$masuk.'</center></td>
				<td><center>'.$keluar.'</center></td>
			</tr>';	
			$totalAmount += $result[7];
			$a++;
		}
		$table .= '
	</tr>

</table>
';	

echo $table;

}

?>