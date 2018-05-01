<?php
error_reporting(0);
include "../../../koneksi.php";
$idjual = $_POST[id_jual];

$search_user=mysql_query("SELECT * FROM `tb_bukti` WHERE `id_jual` = '$idjual'");
							while($user=mysql_fetch_array($search_user)){
								$id_user = $user[id_user];
								$nama_user = $user[nama_user];
								$email_user = $user[email_user];			
							}	

$search_jual=mysql_query("SELECT * FROM tb_jual where id_jual=$idjual");
								while($jual=mysql_fetch_array($search_jual)){
									$nama_penerima = $jual[nama_penerima];
									$nohp = $jual[nohp];
									$kode_pos = $jual[kode_pos];
									$alamat = $jual[alamat];
									$provinsi = $jual[provinsi];
									$kabupaten = $jual[kabupaten];
									$kurir = $jual[kurir];
									$harga_paket = $jual[harga_paket];
									$nama_paket = $jual[nama_paket];
									$status = $jual[status];
									$status = $jual[status];
									$tgl_akhir_transfer = $jual[tgl_akhir_transfer];
									$total_harga_jual = $jual[total_harga_jual];
									$kode_harga = $jual[kode_harga];
								}
$search_bukti=mysql_query("SELECT * FROM `tb_bukti` WHERE `id_jual` = $idjual");
							while($bukti=mysql_fetch_array($search_bukti)){
								$gambar_bukti = $bukti[gambar_bukti];
								$tanggal_bukti = $bukti[tanggal_bukti];	
								$atas_nama = $bukti[atas_nama];	
								$catatan = $bukti[catatan_bukti];			
							}
?>
<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Telah di Bayar pada Tanggal <?php echo $tanggal_bukti; ?></h4>
                    </div>
                    <div class="modal-body">
						<h4>Bukti Transfer :</h4>
						<div class="col-sm-12">
						<div class="col-sm-6">
							
					  				<img src="../../../img_bukti_transfer/<?php echo $gambar_bukti ; ?>"  class="img-responsive" >
						</div>
						<div class="col-sm-6">
						<div class="col-sm-6">
							<p>Atas Nama :<br>
									<b><?php echo $atas_nama; ?></b>
							</p>
						</div>
						<div class="col-sm-6">
							<p>Catatan :<br>
									<b><?php echo $catatan; ?></b>
							</p>
						</div>
						</div>
							
						<div class="col-sm-6">
						<div class="col-sm-12">
							<p>Total Yang Harus Di transfer :
									<h3><font color="#D42629"><b>Rp. <?php echo number_format($total_harga_jual, 0,"." ,"."); ?></b></font></h3></p>
						</div></div>
						</div>
						
						
						<p align="right">
                                <button  data-dismiss="modal" class="btn btn-primary" onClick="verifikasi_ok('<?php echo $idjual; ?>')"><i class="fa fa-sign-in"></i> OK</button>
                      			<button  data-dismiss="modal" class="btn btn-danger" onClick="verifikasi_tolak('<?php echo $id_jual; ?>')"><i class="fa fa-trash"></i> Tolak</button> 
                            </p>
						</div>
						</div>