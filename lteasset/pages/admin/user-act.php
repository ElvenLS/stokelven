<?php

include "../../../koneksi.php";

$nama=$_GET[nama];
$iduser=$_GET[iduser];
$email=$_GET[email];
$gender=$_GET[gender];
$pass=$_GET[pass];
$mdpass=md5($pass);
$status=$_GET[status];
$tombol=$_GET[tombol];

if($tombol=="save"){
	$sql=mysql_query("INSERT INTO `tb_user` VALUES ('', '$nama', '$email', '$gender', '$mdpass', '$status')");
header('location:user.php');
}else if($tombol=="hapus"){
	$sql=mysql_query("DELETE FROM `tb_user` WHERE `tb_user`.`id_user` = $iduser");
	
}else{
header('location:user.php');	
}

?>