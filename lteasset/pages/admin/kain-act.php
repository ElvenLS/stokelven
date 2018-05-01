<?php 
$rdm1 = rand();
$rdm2 = rand();
$rdm3 = rand();
$rdm4 = rand();
?>
<?PHP 

	include "../../../koneksi.php";
	$idkain=$_POST['idkain'];
	$gam=$_POST['gam'];

	$nama=$_POST['nama'];
	$kategori=$_POST['Kategori'];
	$stok=$_POST['stok'];
	$warna=$_POST['warna'];
	$brand=$_POST['brand'];
	$harga=$_POST['harga'];
	$model=$_POST['model'];
	$diskon_h=$_POST['diskon'];
	$info=$_POST['info'];
	$btn=$_POST['tombol'];
	if($diskon_h>0){$diskon=$harga-$diskon_h;}else{$diskon="-";}

	$gambar1=$_FILES['gambar1']['name'];
	$fileError1 = $_FILES['gambar1']['error'];

	$gambar2=$_FILES['gambar2']['name'];
	$fileError2 = $_FILES['gambar2']['error'];

	$gambar3=$_FILES['gambar3']['name'];
	$fileError3 = $_FILES['gambar3']['error'];

	$gambar4=$_FILES['gambar4']['name'];
	$fileError4 = $_FILES['gambar4']['error'];

	$gambar5=$_FILES['gambar5']['name'];
	$fileError5 = $_FILES['gambar5']['error'];

	$typeGambar = array('image/bmp', 'image/gif', 'image/jpg', 'image/jpeg', 'image/png');
	
echo $idkain;
					$search_produk=mysql_query("SELECT * FROM `tb_produk` WHERE `id_produk` = $idkain");
							while($produk=mysql_fetch_array($search_produk)){
												$id_produk = $produk[id_produk];
												$nama_produk = $produk[nama_produk];
												$gambar_produk_gabung = $produk[gambar_produk];
												$kategori_produk = $produk[kategori_produk];
												$brand_produk = $produk[brand_produk];
												$warna_produk = $produk[warna_produk];
												$id_model = $produk[id_model];
												$stok_produk = $produk[stok_produk];
												$harga_produk = $produk[harga_produk];
												$info_produk = $produk[info_produk];
												$tgl_masuk_produk = $produk[tgl_masuk_produk];
												$diskon_produk = $produk[diskon_produk];
												$status_produk = $produk[status_produk];
							}


if($btn=="save"){
	
	if($fileSize=$_FILES['gambar1']['size']< 20000 || $fileError1 < 20000 ||
	   $fileSize=$_FILES['gambar2']['size']< 20000 || $fileError2 < 20000 ||
	   $fileSize=$_FILES['gambar3']['size']< 20000 || $fileError3 < 20000 ||
	   $fileSize=$_FILES['gambar4']['size']< 20000 || $fileError4 < 20000 ||
	   $fileSize=$_FILES['gambar5']['size']< 20000 || $fileError5 < 20000 )
	{
	$sql=mysql_query("UPDATE `tb_produk` SET `status_produk` = '' WHERE `tb_produk`.`status_produk` != '';");
		if($gambar1 != ""){$gambar_1 = $rdm1.$rdm2.$gambar1;}
		if($gambar2 != ""){$gambar_2 = $rdm3.$rdm4.$gambar2;}
		if($gambar3 != ""){$gambar_3 = $rdm2.$rdm1.$gambar3;}
		if($gambar4 != ""){$gambar_4 = $rdm3.$rdm4.$gambar4;}
		if($gambar5 != ""){$gambar_5 = $rdm2.$rdm4.$gambar5;}
	
	$sql=mysql_query("insert into tb_produk values('','$nama','$gambar_1,$gambar_2,$gambar_3,$gambar_4,$gambar_5','$kategori','$brand','$warna','$stok','$model','$harga','$info','','','$diskon','new','no')");

	$move = move_uploaded_file($_FILES['gambar1']['tmp_name'],'../../../img_produk/'.$rdm1.$rdm2.$gambar1 );
	$move = move_uploaded_file($_FILES['gambar2']['tmp_name'],'../../../img_produk/'.$rdm3.$rdm4.$gambar2 );
	$move = move_uploaded_file($_FILES['gambar3']['tmp_name'],'../../../img_produk/'.$rdm2.$rdm1.$gambar3 );
	$move = move_uploaded_file($_FILES['gambar4']['tmp_name'],'../../../img_produk/'.$rdm3.$rdm4.$gambar4 );
	$move = move_uploaded_file($_FILES['gambar5']['tmp_name'],'../../../img_produk/'.$rdm2.$rdm4.$gambar5);

	$sql=mysql_query("SELECT * FROM `tb_produk` WHERE `id_produk` !='' ORDER BY `id_produk` DESC LIMIT 5");
		while($produk=mysql_fetch_array($sql)){
							$id_produk = $produk[id_produk];
			$query=mysql_query("UPDATE `tb_produk` SET `status_produk` = 'new' WHERE `tb_produk`.`id_produk` = $id_produk;");
		}
	header('location:kain.php');

	}else{
			echo '<script language="javascript" type="text/javascript">
	alert("Eror!");
	</script>';
	header('location:kain.php');
	}
	
}else if($btn=="Update"){
			if($gambar1 != "" or $gambar2 != "" or $gambar3 != "" or $gambar4 != "" or $gambar5 != ""){
					 $gambar_produk = explode(",",$gambar_produk_gabung);
						$n=0;
						$ht=count ($gambar_produk);
							while ($n<$ht){
								if($gambar_produk[$n]!=""){
									unlink('../../../img_produk/'.$gambar_produk[$n]);
								}
								$n++;	
							}
					if($gambar1 != ""){$gambar_1 = $rdm1.$rdm2.$gambar1;}
					if($gambar2 != ""){$gambar_2 = $rdm3.$rdm4.$gambar2;}
					if($gambar3 != ""){$gambar_3 = $rdm2.$rdm1.$gambar3;}
					if($gambar4 != ""){$gambar_4 = $rdm3.$rdm4.$gambar4;}
					if($gambar5 != ""){$gambar_5 = $rdm2.$rdm4.$gambar5;}
				
	$move = move_uploaded_file($_FILES['gambar1']['tmp_name'],'../../../img_produk/'.$rdm1.$rdm2.$gambar1 );
	$move = move_uploaded_file($_FILES['gambar2']['tmp_name'],'../../../img_produk/'.$rdm3.$rdm4.$gambar2 );
	$move = move_uploaded_file($_FILES['gambar3']['tmp_name'],'../../../img_produk/'.$rdm2.$rdm1.$gambar3 );
	$move = move_uploaded_file($_FILES['gambar4']['tmp_name'],'../../../img_produk/'.$rdm3.$rdm4.$gambar4 );
	$move = move_uploaded_file($_FILES['gambar5']['tmp_name'],'../../../img_produk/'.$rdm2.$rdm4.$gambar5);

					$sql=mysql_query("UPDATE `tb_produk` SET `nama_produk` = '$nama', `gambar_produk` = '$gambar_1,$gambar_2,$gambar_3,$gambar_4,$gambar_5', `kategori_produk` = '$kategori', `brand_produk` = '$brand', `warna_produk` = '$warna', `stok_produk` = '$stok', `id_model` = '$model', `harga_produk` = '$harga', `info_produk` = '$info', `diskon_produk` = '$diskon' WHERE `tb_produk`.`id_produk` = $idkain;");	
			}else{
					$sql=mysql_query("UPDATE `tb_produk` SET `nama_produk` = '$nama', `kategori_produk` = '$kategori', `brand_produk` = '$brand', `warna_produk` = '$warna', `stok_produk` = '$stok', `id_model` = '$model', `harga_produk` = '$harga', `info_produk` = '$info', `diskon_produk` = '$diskon' WHERE `tb_produk`.`id_produk` = $idkain;");	

			}
		
	header('location:kain.php');
							
	
	
}else if($btn=="delete"){
					
		$sql=mysql_query("UPDATE `tb_produk` SET `hapus` = 'Yes' WHERE `tb_produk`.`id_produk` = $idkain");
		
							
	
	
}else{echo $btn;}

	
?>