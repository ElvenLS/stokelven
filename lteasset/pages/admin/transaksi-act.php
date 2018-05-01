<?php

include "../../../koneksi.php";

$id_jual=$_POST[id_jual];
$tombol=$_POST[tombol];
echo $id_jual;
if($tombol=="v-ok"){
	$sql=mysql_query("UPDATE `tb_jual` SET `status` = 'sudah verifikasi' WHERE `tb_jual`.`id_jual` = $id_jual");
	
}else if($tombol=="v-tolak"){
	$sql=mysql_query("UPDATE `tb_jual` SET `status` = 'Di tolak' WHERE `tb_jual`.`id_jual` = $id_jual");
}else if($tombol=="k-ok"){
	$noresi=$_POST[noresi];
	$tanggal=date('d-m-Y');
	$sql=mysql_query("UPDATE `tb_jual` SET `status` = 'sudah dikirim',`tanggal_kirim` = '$tanggal', `noresi` = '$noresi' WHERE `tb_jual`.`id_jual` = $id_jual");
	
	$search_jual=mysql_query("SELECT * FROM tb_jual where id_jual=$id_jual");
								while($jual=mysql_fetch_array($search_jual)){
									$no_invoice = $jual[no_invoice];
									$id_user = $jual[id_user];
									$kurir = $jual[kurir];
								}
	$search_user=mysql_query("SELECT * FROM `tb_user` WHERE `id_user` = $id_user");
							while($user=mysql_fetch_array($search_user)){
								$nama_user = $user[nama_user];
								$email_user = $user[email_user];			
							}

	header('location:../../../email/sudah_kirim.php?invoice='.$no_invoice.'&kurir='.$kurir.'&email='.$email_user.'&resi='.$noresi);
}

echo "UPDATE `tb_jual` SET `status` = 'sudah verifikasi' WHERE `tb_jual`.`id_jual` = $id_jual";


if($tombol=="save"){
	$sql=mysql_query("INSERT INTO `tb_user` VALUES ('', '$nama', '$email', '$gender', '$mdpass', '$status')");
header('location:user.php');
}else if($tombol=="hapus"){
	$sql=mysql_query("DELETE FROM `tb_user` WHERE `tb_user`.`id_user` = $iduser");
	
}

?>