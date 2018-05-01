<?php 
error_reporting(0);
$rdm1 = rand();
$rdm2 = rand();
?>
<?PHP 

	include "../../../koneksi.php";
	$nama=$_POST['nama'];
	$idmodel=$_POST['idmodel'];
	$harga=$_POST['harga'];
	$btn=$_POST['tombol'];
	$gam=$_POST['gam'];
	$gambar=$_FILES['gambar']['name'];
	$fileError = $_FILES['gambar']['error'];
	$typeGambar = array('image/bmp', 'image/gif', 'image/jpg', 'image/jpeg', 'image/png');

		$search_model=mysql_query("SELECT * FROM tb_model where id_model=$idmodel");
							while($model=mysql_fetch_array($search_model)){
												$nama_model = $model[nama_model];
												$gambar_model = $model[gambar_model];
												$harga_model = $model[harga_model];
							}

if($btn=="save"){
	
	if($fileSize=$_FILES['gambar']['size']< 20000 || $fileError < 20000)
	{
		$sql=mysql_query("UPDATE `tb_model` SET `status_model` = '' WHERE `tb_model`.`status_model` != '';");
	$sql=mysql_query("insert into tb_model values('','$nama','$rdm1$rdm2$gambar','$harga','new','no')");

	$move = move_uploaded_file($_FILES['gambar']['tmp_name'],'../../../img_model/'.$rdm1.$rdm2.$gambar );

	$sql=mysql_query("SELECT * FROM `tb_model` WHERE `id_model` !='' ORDER BY `id_model` DESC LIMIT 5");
		while($model=mysql_fetch_array($sql)){
							$id_model = $model[id_model];
			$query=mysql_query("UPDATE `tb_model` SET `status_model` = 'new' WHERE `tb_model`.`id_model` = $id_model;");
		}
	header('location:model.php');

	}else{
			echo '<script language="javascript" type="text/javascript">
	alert("Eror!");
	</script>';
	header('location:model.php');
	}
	
}
else if($btn=="Update"){
	if($gambar==""){
		$sql=mysql_query("UPDATE `tb_model` SET `nama_model` = '$nama', `harga_model` = '$harga' WHERE `tb_model`.`id_model` = $idmodel");
	
	}else{
		$sql=mysql_query("UPDATE `tb_model` SET `nama_model` = '$nama', `gambar_model` = '$rdm1$rdm2$gambar', `harga_model` = '$harga' WHERE `tb_model`.`id_model` = $idmodel");
		$move = move_uploaded_file($_FILES['gambar']['tmp_name'],'../../../img_model/'.$rdm1.$rdm2.$gambar );
		
		unlink('../../../img_model/'.$gambar_model);
	}
	
	header('location:model.php');
}
else if($btn=="delete"){
		$sql=mysql_query("UPDATE `tb_model` SET `hapus` = 'yes' WHERE `tb_model`.`id_model` = $idmodel");
}else{echo $btn;}


	
?>