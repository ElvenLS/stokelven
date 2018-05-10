<?php
include "../../php_action/db_connect.php";

$productid = json_decode(stripslashes($_GET['id']),true);
$quantity = json_decode(stripslashes($_GET['quantity']),true);
$qty = json_decode(stripslashes($_GET['qty']),true);
$operasi = $_GET['operasi'];
$banyak = count($productid);

if($operasi == 'tambah'){
	for ($i=0; $i < $banyak; $i++) {
		$tambah = $qty[$i]['value'] + $quantity[$i]['value'];	
		$sql = "update products set qty = $tambah where productid = ".$productid[$i]['value'];
		// echo $sql;
		$result = mysqli_query($connect, $sql);
		$logid = "select max(logid) from log";
		$hasil = mysqli_query($connect, $logid);
		$id = mysqli_fetch_array($hasil);
		$id[0] = $id[0] + 1;
		$sql2 = "insert into log (logid, productid, qty, jenis, timestamp) values ('$id[0]', ".$productid[$i]['value'].", ".$quantity[$i]['value'].", 'Masuk' ,now())";
		$result = mysqli_query($connect, $sql2);
	}
} else {
	for ($i=0; $i < $banyak; $i++) {
		$kurangi = $qty[$i]['value'] - $quantity[$i]['value'];	
		$sql = "update products set qty = $kurangi where productid = ".$productid[$i]['value'];
		$result = mysqli_query($connect, $sql);
		$logid = "select max(logid) from log";
		$hasil = mysqli_query($connect, $logid);
		$id = mysqli_fetch_array($hasil);
		$id[0] = $id[0] + 1;
		$sql2 = "insert into log (logid, productid, qty, jenis, timestamp) values ('$id[0]', ".$productid[$i]['value'].", ".$quantity[$i]['value'].", 'Keluar' ,now())";
		$result = mysqli_query($connect, $sql2);
	}
}

?>