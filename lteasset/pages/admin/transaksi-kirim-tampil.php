<?php
error_reporting(0);
include "../../../koneksi.php";
?>
<div class="box-body">
	
				
              <table id="example1" class="table table-bordered table-hover table-responsive">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Jumlah item</th>
                  <th>Atas nama</th>
                  <th>No Hp</th>
                  <th>Kode Pos</th>
                  <th>Alamat</th>
                  <th>Provinsi</th>
                  <th>Kabupaten</th>
                  <th>Kurir</th>
                  <th>Paket</th>
					
                </tr>
                </thead>
                <tbody>
					<?php
					$search_jual=mysql_query("SELECT * FROM tb_jual where status = 'sudah verifikasi'");
							while($jual=mysql_fetch_array($search_jual)){
								
												$id_jual = $jual[id_jual];
												$jumlah_item = $jual[jumlah_barang_jual];
												$penerima = $jual[nama_penerima];
												$nohp = $jual[nohp];
												$kode_pos = $jual[kode_pos];
												$alamat = $jual[alamat];
												$provinsi = $jual[provinsi];
												$kabupaten = $jual[kabupaten];
												$kurir = $jual[kurir];
												$paket = $jual[nama_paket];
												$id_user = $jual[id_user];
												$total_harga_jual = $jual[total_harga_jual];
												$status = $jual[status];
												$noresi = $jual[noresi];
												$no_invoice = $jual[no_invoice];
								
							$search_user=mysql_query("SELECT * FROM `tb_user` WHERE `id_user` = $id_user");
							while($user=mysql_fetch_array($search_user)){
								$nama_user = $user[nama_user];
								$email_user = $user[email_user];			
							}
							$search_bukti=mysql_query("SELECT * FROM `tb_bukti` WHERE `id_jual` = $id_jual");
							while($bukti=mysql_fetch_array($search_bukti)){
								$gambar_bukti = $bukti[gambar_bukti];
								$tanggal_bukti = $bukti[tanggal_bukti];	
								$atas_nama = $bukti[atas_nama];			
							}			
					?>
					
					
                <tr onClick="cek_kirim(<?php echo $id_jual;?>)" data-toggle="modal" data-target="#cek-modal">
					
                  <td><?php echo $no_invoice;?></td>
                  <td><?php echo $jumlah_item ;?></td>
                  <td><?php echo $penerima ;?></td>
                  <td><?php echo $nohp ;?></td>
                  <td><?php echo $kode_pos ;?></td>
                  <td><?php echo $alamat ;?></td>
                  <td><?php echo $provinsi ;?></td>
                  <td><?php echo $kabupaten ;?></td>
                  <td><?php echo $kurir ;?></td>
                  <td><?php echo $paket ;?></td>
                  
                </tr>
					<?php }
					?>
					
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Jumlah item</th>
                  <th>Atas nama</th>
                  <th>No Hp</th>
                  <th>Kode Pos</th>
                  <th>Alamat</th>
                  <th>Provinsi</th>
                  <th>Kabupaten</th>
                  <th>Kurir</th>
                  <th>Paket</th>
                </tr>
                </tfoot>
              </table>
            </div>




<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    //$('#example2').DataTable({
      //'paging'      : true,
      //'lengthChange': false,
      //'searching'   : false,
      //'ordering'    : true,
      //'info'        : true,
      //'autoWidth'   : false
    //})
  })
</script>