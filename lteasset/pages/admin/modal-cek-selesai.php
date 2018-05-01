<?php
error_reporting(0);
include "../../../koneksi.php";
$idjual = $_POST[id_jual];

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
									$tgl_akhir_transfer = $jual[tgl_akhir_transfer];
									$total_harga_jual = $jual[total_harga_jual];
									$kode_harga = $jual[kode_harga];
									$noresi = $jual[noresi];
									$tanggal_kirim = $jual[tanggal_kirim];
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
                        <h4 class="modal-title" id="Login">Telah di Kirim pada Tanggal <?php echo $tanggal_kirim; ?></h4>
                    </div>
                    <div class="modal-body">
												
						<h4>Dikirim Melalui :</h4>
						<div class="col-sm-12">
						<div class="col-sm-3">
							<p>Nama Kurir :<br><b>
							<?php echo $kurir; ?></b>
							</p>
						</div>
						<div class="col-sm-3">
							<p>Nama paket :<br><b>
								<?php echo $nama_paket; ?></b>
							</p>
						</div>
						<div class="col-sm-3">
							<p>No Resi :<br><b>
								<?php echo $noresi;?> </b>
							</p>
						</div>
						<div class="col-sm-3">
							<p>Harga Paket :<br><b>
								Rp. <?php echo number_format($harga_paket,0,".",".");?> </b>
							</p>
						</div>
						</div>

						
						
						
						<h4>Dikirim kepada :</h4>
						
					   <div class="col-sm-12">
						<div class="row">
						<div class="col-sm-3">
							<p>Nama Lengkap :<br><b>
							<?php echo $nama_penerima; ?></b>
							</p>
						</div>
						<div class="col-sm-3">
							<p>Provinsi :<br><b>
								<?php echo $provinsi; ?></b>
							</p>
						</div>
						<div class="col-sm-3">
							<p>Kabupaten :<br><b>
								<?php echo $kabupaten; ?></b>
							</p>
						</div>
						<div class="col-sm-3">
							<p>kode Pos:<br><b>
							<?php echo $kode_pos; ?></b>
							</p>
						</div>
						</div>
						
						<div class="row">
						
						<div class="col-sm-3">
							<p>No. Telp :<br><b>
							<?php echo $nohp; ?></b>
							</p>
						</div>
							
						
						<div class="col-sm-9">
							<p>Alamat :<br><b>
							<?php echo $alamat; ?></b>
							</p>
						</div>
						</div>
					   </div>
						<br>
						
						
						<h4>Barang Yang di Beli :</h4>
<table class="table" >
	<tr>
											<td>
												Kain
											</td>
											<td>
												Model
											</td>
											<td>
												Warna
											</td>
											<td>
												Jumlah
											</td>
											<td>
												Total Harga
											</td>
										</tr>
<?php

$total=0;
$search_jual_detil=mysql_query("SELECT * FROM `tb_jual_detil` WHERE `id_jual` = $idjual");
							while($jual_detil=mysql_fetch_array($search_jual_detil)){
								$id_barang = $jual_detil[id_barang];
									$search_produk=mysql_query("SELECT * FROM tb_produk where id_produk='".$id_barang."' ");
										while($produk_detil=mysql_fetch_array($search_produk)){
											$nama_produk = $produk_detil[nama_produk];
											$gambar_produk_gabung = $produk_detil[gambar_produk];
											$gambar_produk = explode(",",$gambar_produk_gabung);
										}
									$id_model = $jual_detil[id_model];
									$search_model=mysql_query("SELECT * FROM tb_model where id_model='".$id_model."' ");
										while($model_detil=mysql_fetch_array($search_model)){
											$gambar_model = $model_detil[gambar_model];
										}
									$warna = $jual_detil[warna];
									$jumlah = $jual_detil[jumlah];
									$harga_barang = $jual_detil[harga_barang];
									$harga_model = $jual_detil[harga_model];
									$total_harga = $jual_detil[total_harga];
									
							?>	
						
										<tr>
											<td>
												<p class="text-muted"><font size="+1"><?php echo $nama_produk; ?></font>
													<br>
												<img height="70px" src="../../../img_produk/<?php echo $gambar_produk[0]; ?>">
											</td>
											<td>
												<p class="text-muted"><font size="+1">
													
													<?php if($id_model=="notailor"){ 
														echo "-"; 
															}else{; 
													?>
													<img height="100px" src="../../../img_model/<?php echo $gambar_model; ?>">
													<?php } ?>
												</font></p>
											</td>
											<td>
												<p class="text-muted"><font size="+1"><?php echo $warna; ?></font></p>
											</td>
											<td>
												<p class="text-muted"><font size="+1"><?php echo $jumlah; ?></font></p>
											</td>
											<td>
												<p class="text-muted"><font size="+1" color="#D42629">Rp.<span id='harga'><?php echo number_format($total_harga, 0,"." ,"."); ?></span></font>
											</td>
										</tr>
							
						<?php
										$total+=$total_harga;
								}
										
						?>
	
										<tr>
											<td></td>
											<td></td>
											<td colspan="2" rowspan="2">
												<p align="right"><font size="+1"  > <b>Total Harga :</b> </font></p>
												<p align="right"><font size="+1"  > <b>Kode unik :</b> </font></p>
												<p align="right"><font size="+1"  > <b>Ongkos Kirim:</b> </font></p>
												<p align="right"><font size="+1"  > <b>Grand Total:</b> </font></p>
											</td>
											<td>
												<p class="text-muted"><font size="+1" color="#D42629">Rp.
													<?php echo number_format($total , 0,"." ,"."); ?>
												</font></p>
												<p class="text-muted"><font size="+1" color="#D42629">Rp.
													<?php echo number_format($kode_harga , 0,"." ,"."); ?>
												</font></p>
												<p class="text-muted"><font size="+1" color="#D42629">Rp.
													<?php echo number_format($harga_paket , 0,"." ,"."); ?>
												</font></p>
												<p class="text-muted"><font size="+1" color="#D42629">Rp.
													<?php echo number_format($total_harga_jual , 0,"." ,"."); ?>
												</font></p>
											</td>
								</tr>
</table>
	</div></div>