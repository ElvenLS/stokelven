<?php

error_reporting(0);
include "../../../koneksi.php";
$id_model = $_GET[id_model];
$tombol = $_GET[btn];
?>
			<div class="box-body">
				
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                  <th>Id Produk</th>
                  <th>Nama</th>
                  <th>Gambar</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
					<?php
					$search_model=mysql_query("SELECT * FROM tb_model WHERE `hapus` = 'no'");
							while($model=mysql_fetch_array($search_model)){
												$id_model = $model[id_model];
												$nama_model = $model[nama_model];
												$gambar_model = $model[gambar_model];
												$harga_model = $model[harga_model];
												
					?>
					
					
                <tr>
					
                  <td><?php echo $id_model ;?></td>
                  <td><?php echo $nama_model ;?></td>
                  <td><img src="../../../img_model/<?php echo $gambar_model;?>" height="50px"></td>
                  <td><?php echo $harga_model;?>  </td>
                  <td>
					  <button class="btn btn-warning" onClick="edit_model('<?php echo $id_model; ?>')"> Edit</button> 
					  <button class="btn btn-danger" onClick="hapus_model('<?php echo $id_model; ?>','<?php echo $gambar_model; ?>')">Delete</button> 
				  </td>
                </tr>
					<?php }
					?>
					
                </tbody>
                <tfoot>
                <tr>
                  <th>Id Produk</th>
                  <th>Nama</th>
                  <th>Gambar</th>
                  <th>Harga</th>
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