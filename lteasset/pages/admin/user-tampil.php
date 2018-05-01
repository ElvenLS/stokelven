<?php

error_reporting(0);
include "../../../koneksi.php";
$id_user = $_GET[id_user];
$tombol = $_GET[btn];
?>
			<div class="box-body">
				
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id User</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
					<?php
					$search_user=mysql_query("SELECT * FROM tb_user");
							while($user=mysql_fetch_array($search_user)){
												$id_user = $user[id_user];
												$nama_user = $user[nama_user];
												$email_user = $user[email_user];
												$gender_user = $user[gender_user];
												$status = $user[status];
												
					?>
					
					
                <tr>
                  <td><?php echo $id_user ;?></td>
                  <td><?php echo $nama_user ;?></td>
                  <td><?php echo $email_user ;?></td>
                  <td><?php echo $gender_user ;?></td>
                  <td><?php echo $status ;?></td>
                  <td>
					  <button class="btn btn-danger" onClick="hapus_user('<?php echo $id_user; ?>')">Delete</button> 
				  </td>
                </tr>
					<?php }
					?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id User</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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