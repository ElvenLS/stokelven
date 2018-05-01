<?php
error_reporting(0);
include "../../../koneksi.php";
$id_user = $_GET[id_user];
$tombol = $_GET[btn];
?>
<div class="box-body">
	<h3>Tambah Model</h3>
	<?php
					$search_user=mysql_query("SELECT * FROM tb_user where id_user='$id_user'");
							while($user=mysql_fetch_array($search_user)){
												$id_user = $user[id_user];
												$nama_user = $user[nama_user];
												$email_user = $user[email_user];
												$gender_user = $user[gender_user];
												$status = $user[status];
							}
					?>
	
					<form action="model-act.php" method="post" enctype="multipart/form-data">
						
              <table class="table">	
                <tr>
				  <td align="">Nama Model :</td>
                  <td><input class="form-control" type="text" id="nama" name="nama"></td>
				</tr>
                <tr>
				  <td>Gambar :</td>
                  <td><input class="form-control" type="file" id="gambar" name="gambar"></td>
				</tr>
                <tr>
				  <td>Harga :</td>
                  <td><input class="form-control" type="number" id="harga" name="harga"></td>
				</tr>
                <tr>
				  <td><button type="button" class="btn" onClick="ref_model()">Cancel</button></td>
                  <td><input type="submit" class="btn btn-primary" value="save" id="tombol" name="tombol"></td>
				</tr>
                <tr>
				  <td></td>
                  <td></td>
				  <td width="50%"></td>
				</tr>
               
					
              </table></form>
            </div>