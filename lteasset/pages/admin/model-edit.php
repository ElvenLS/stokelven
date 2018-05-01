<?php
error_reporting(0);
include "../../../koneksi.php";
$id_model = $_POST[id_model];
$tombol = $_GET[btn];
?>
<div class="box-body">
	<h3>Edit Model</h3>
	<?php
					$search_model=mysql_query("SELECT * FROM tb_model where id_model=$id_model");
							while($model=mysql_fetch_array($search_model)){
												$nama_model = $model[nama_model];
												$gambar_model = $model[gambar_model];
												$harga_model = $model[harga_model];
							}
					?>
	
					<form action="model-act.php" method="post" enctype="multipart/form-data">
						
              <table class="table">	
                <tr>
				  <td align="">Nama Model :</td>
                  <td>
					  <input hidden name="idmodel" value="<?php echo $id_model; ?>">
					  <input class="form-control" type="text" id="nama" name="nama" value="<?php echo $nama_model; ?>"></td>
				</tr>
                <tr>
				  <td>Gambar :</td>
                  <td><input class="form-control" type="file" id="gambar" name="gambar"></td>
				</tr>
                <tr>
				  <td>Harga :</td>
                  <td><input class="form-control" type="number" id="harga" name="harga" value="<?php echo $harga_model; ?>"></td>
				</tr>
                <tr>
				  <td><button type="button" class="btn" onClick="ref_model()">Cancel</button></td>
                  <td><input type="submit" class="btn btn-warning" value="Update" id="tombol" name="tombol"></td>
				</tr>
                <tr>
				  <td></td>
                  <td></td>
				  <td width="50%"></td>
				</tr>
               
					
              </table></form>
            </div>