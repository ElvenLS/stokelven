<?php
error_reporting(0);
include "../../../koneksi.php";
?>
<div class="box-body">
	
				
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
					
                  <th>Invoice</th>
                  <th>Atas Nama</th>
                  <th>Email</th>
                  <th>Total Transfer</th>
                  <th>Bukti Transfer</th>
                  <th>Tanggal Verifikasi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
					<?php
					$search_jual=mysql_query("SELECT * FROM tb_jual where status = 'sudah transfer'");
							while($jual=mysql_fetch_array($search_jual)){
												$id_jual = $jual[id_jual];
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
					
					
                <tr>
					
                  <td  onClick="cek(<?php echo $id_jual;?>)" data-toggle="modal" data-target="#cek-modal"><?php echo $no_invoice ;?></td>
                  <td  onClick="cek(<?php echo $id_jual;?>)" data-toggle="modal" data-target="#cek-modal"><?php echo $atas_nama ;?></td>
                  <td  onClick="cek(<?php echo $id_jual;?>)" data-toggle="modal" data-target="#cek-modal"><?php echo $email_user ;?></td>
                  
                  <td  onClick="cek(<?php echo $id_jual;?>)" data-toggle="modal" data-target="#cek-modal">Rp. <?php echo number_format($total_harga_jual,0,"." ,".") 
						;?></td>
				 
                  <td  onClick="cek(<?php echo $id_jual;?>)" data-toggle="modal" data-target="#cek-modal">
					  <img src="../../../img_bukti_transfer/<?php echo $gambar_bukti ; ?>" width="50px">
					  
					  
				 </td>
                  <td><?php echo $tanggal_bukti ;?></td>
					
                  <td>
                      <button  data-dismiss="modal" class="btn btn-primary" onClick="verifikasi_ok('<?php echo $id_jual; ?>')"><i class="fa fa-sign-in"></i> OK</button> 
                      <button  data-dismiss="modal" class="btn btn-danger" onClick="verifikasi_tolak('<?php echo $id_jual; ?>')"><i class="fa fa-trash"></i> Tolak</button> 
				  </td>
                </tr>
					<?php }
					?>
					
                </tbody>
                <tfoot>
                <tr>
					
                  <th>Invoice</th>
                  <th>Atas Nama</th>
                  <th>Email</th>
                  <th>Total Transfer</th>
                  <th>Bukti Transfer</th>
                  <th>Tanggal Verifikasi</th>
                  <th>Action</th>
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