
<?php
error_reporting(0);
include "../../../koneksi.php";
?>
<?php
$idkain=$_POST[idkain];
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
				if($diskon_produk=="-"){$diskon="0";}else{
					$diskon=$harga_produk-$diskon_produk;
				}
												
					?>
<div class="box-body">
	<h3>Edit Kain</h3>

	
			<form action="kain-act.php" method="post" enctype="multipart/form-data">
						
              <table class="table">	
				  <input hidden type="text" id="idkain" name="idkain" value="<?php echo $idkain; ?>" placeholder="Kain" )
                <tr>
				  <td align="">Nama Kain :</td>
                  <td><input class="form-control" type="text" id="nama" name="nama" value="<?php echo $nama_produk; ?>" placeholder="Kain" required></td>
				</tr>
				<tr>
				  <td align="">Kategori Kain :</td>
                  <td>
					  <select id="Kategori" name="Kategori" class="form-control">
					  	<option value="Polos" <?php if($kategori_produk=="Polos"){echo "selected";} ?>>Polos</option>
					  	<option value="Kembang" <?php if($kategori_produk=="Kembang"){echo "selected";} ?>>Kembang</option>
					  	<option value="Tile" <?php if($kategori_produk=="Tile"){echo "selected";} ?>>Tile</option>
					  </select>
				</td>
				</tr>
				<tr>
				  <td align="">Brand Kain :</td>
                  <td><input class="form-control" type="text" id="brand" name="brand" placeholder="Brand" value="<?php echo $brand_produk; ?>"></td>
				</tr>
				<tr>
				  <td align="">Warna Kain :</td>
                  <td><textarea class="form-control" id="warna" name="warna" placeholder="1-Merah,2-Kuning,3-Pink" ><?php echo $warna_produk; ?></textarea></td>
				</tr>
                <tr>
					<td>Info Produk :</td>
					<td>
					<div class="box-body pad">
							<textarea required name="info" id="info" class="textarea" placeholder="Info Produk"
											  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						<?php echo $info_produk; ?>
						</textarea>
					</div>
					</td>
				</tr>
                <tr>
				  <td>Gambar 1 :</td>
                  <td><input class="form-control" type="file" id="gambar1" name="gambar1"></td>
				</tr>
                <tr>
				  <td>Gambar 2 :</td>
                  <td><input class="form-control" type="file" id="gambar2" name="gambar2"></td>
				</tr>
                <tr>
				  <td>Gambar 3 :</td>
                  <td><input class="form-control" type="file" id="gambar3" name="gambar3"></td>
				</tr>
                <tr>
				  <td>Gambar 4 :</td>
                  <td><input class="form-control" type="file" id="gambar4" name="gambar4"></td>
				</tr>
                <tr>
				  <td>Gambar 5 :</td>
                  <td><input class="form-control" type="file" id="gambar5" name="gambar5"></td>
				</tr>
                <tr>
				  <td>Stok :</td>
                  <td><input class="form-control" type="number" id="stok" name="stok" required placeholder="Stok" value="<?php echo $stok_produk; ?>"></td>
				</tr>
                <tr>
				  <td>Model :</td>
                  <td>
					  
					  <select id="model" name="model" class="form-control">
					  	<option value="Yes" <?php if($id_model=="Yes"){echo "selected";} ?>>Yes</option>
					  	<option value="No" <?php if($id_model=="No"){echo "selected";} ?>>No</option>
					  </select>
					</td>
				</tr>
				<script>
				function cek_dis(){
					var harga = document.getElementById('harga').value;
					var diskon = document.getElementById('diskon').value;
					if(diskon>harga){
						alert("Jumlah Diskon Lebih besar dari Harga");
					document.getElementById('diskon').value="";
					}
				}
				</script>
				
                <tr>
				  <td>Harga :</td>
                  <td><input class="form-control" type="number" id="harga" name="harga" required placeholder="Harga" value="<?php echo $harga_produk; ?>" onChange="cek_dis()"></td>
				</tr>
                <tr>
				  <td>Diskon : Rp.</td>
                  <td><input class="form-control" type="number" id="diskon" name="diskon" placeholder="Diskon" value="<?php echo $diskon; ?>" onChange="cek_dis()"></td>
				</tr>
                <tr>
				  <td><button type="button" class="btn" onClick="ref_kain()">Cancel</button></td>
                  <td><input type="submit" class="btn btn-warning" value="Update" id="tombol" name="tombol"></td>
				</tr>
                <tr>
				  <td></td>
                  <td></td>
				  <td width="10%"></td>
				</tr>
               
					
              </table>
	</form>
            </div>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="../../bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
	
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
