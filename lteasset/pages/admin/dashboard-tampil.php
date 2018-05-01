<?php 
error_reporting(0);
include "../../../koneksi.php";
					$search_jual=mysql_query("SELECT * FROM tb_jual where status = 'sudah transfer'");
				 		$tran=mysql_num_rows($search_jual);
					$search_kirim=mysql_query("SELECT * FROM tb_jual where status = 'sudah verifikasi'");
				 		$kirim=mysql_num_rows($search_kirim);
					$search_produk=mysql_query("SELECT * FROM tb_produk where stok_produk < 5 and hapus ='no'" );
				 		$produk=mysql_num_rows($search_produk);
				 
					$search_jual=mysql_query("SELECT * FROM `tb_jual` where status = 'belum transfer'");
							while($jual=mysql_fetch_array($search_jual)){
												$id_jual = $jual[id_jual];
												$tgl_akhir = $jual[tgl_akhir_transfer];
								
					$tod= strtotime(date("d-m-Y H:i:s"));
					$tgl_ak= strtotime($tgl_akhir);
				
								if($tod>date($tgl_ak)){
									$sql=mysql_query("UPDATE `tb_jual` SET `status` = 'jatuh tempo' WHERE `tb_jual`.`id_jual` = $id_jual;");
									
								}	
												
							}
				 
				 ?>

<body onLoad="">
	<a href="transaksi.php">
			   <div class="col-md-4 col-sm-8" >
				   
				  <div class="info-box" >
						<span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

					<div class="info-box-content">
					  <span class="info-box-text">Verifikasi Transfer</span>
					  <span class="info-box-number"><?php echo $tran ; ?> Pesanan</span>
					</div>
				<!-- /.info-box-content -->
				 </div>
			  <!-- /.info-box -->
			  </div>
	</a>
	<a href="transaksi.php">
			   <div class="col-md-4 col-sm-8">
				  <div class="info-box" >
						<span class="info-box-icon bg-blue"><i class="fa fa-car"></i></span>

					<div class="info-box-content">
					  <span class="info-box-text">Belum Kirim</span>
					  <span class="info-box-number"><?php echo $kirim ; ?> Pesanan</span>
					</div>
				<!-- /.info-box-content -->
				 </div>
			  <!-- /.info-box -->
			  </div>
	</a>
	<a href="kain.php">
			   <div class="col-md-4 col-sm-8">
				  <div class="info-box" >
						<span class="info-box-icon bg-red"><i class="fa fa-inbox"></i></span>

					<div class="info-box-content">
					  <span class="info-box-text">Stok Kurang dari 5</span>
					  <span class="info-box-number"><?php echo $produk ; ?> Item</span>
					</div>
				<!-- /.info-box-content -->
				 </div>
			  <!-- /.info-box -->
		</div></a>
            <!-- /.box-body -->
</body>