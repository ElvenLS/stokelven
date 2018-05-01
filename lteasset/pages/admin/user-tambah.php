<?php
error_reporting(0);
include "../../../koneksi.php";
$id_user = $_GET[id_user];
$tombol = $_GET[btn];
?>
<div class="box-body">
	<h3>Tambah User</h3>
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
	
					<form action="user-act.php" method="get">
						
              <table class="table">	
                <tr>
				  <td align="">Nama User :</td>
                  <td><input class="form-control" type="text" id="nama" name="nama" value=""></td>
				</tr>
                <tr>
				  <td>Email User :</td>
                  <td><input class="form-control" type="email" id="email" name="email" value=""></td>
				</tr>
                <tr>
				  <td>Password :</td>
                  <td><input class="form-control" type="password" id="pass" name="pass" value=""></td>
				</tr>
                <tr>
				  <td>RePassword :</td>
                  <td><input class="form-control" type="password" id="repass" name="repass" value=""></td>
				</tr>
                <tr>
				  <td>Gender User :</td>
                  <td>
					  <input type="radio" id="gender" name="gender" value="male" > Male
					  <input type="radio" id="gender" name="gender" value="female"> Female
				 </td>
				</tr>
                <tr>
				  <td>Status User :</td>
                  <td>
					  <select id="status" name="status" class="form-control">
						  <option value="admin">admin</option>
						  <option value="user">user</option>
					  </select>
					  
				</tr>
                <tr>
				  <td><button type="button" class="btn" onClick="ref_user()">Cancel</button></td>
                  <td><input type="submit" class="btn btn-primary" value="save" id="tombol" name="tombol"></td>
				</tr>
                <tr>
				  <td></td>
                  <td></td>
				  <td width="50%"></td>
				</tr>
               
					
              </table></form>
            </div>