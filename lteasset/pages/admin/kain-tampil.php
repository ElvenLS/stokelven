<?php

error_reporting(0);
include "../../../koneksi.php";
?>
            <div class="box-body">
				
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Gambar</th>
                  <th>Harga</th>
                  <th>Harga Setelah Diskon</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
					<?php
					$search_produk=mysql_query("SELECT * FROM tb_produk WHERE `hapus` = 'no'");
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
												
					?>
					
					
                <tr>
					
                  <td><?php echo $id_produk ;?></td>
                  <td><?php echo $nama_produk ;?></td>
                  <td><?php echo $kategori_produk ;?></td>
                  <td>
					  <?php 
					  $gambar_produk = explode(",",$gambar_produk_gabung);
							$n=0;
								$ht=count ($gambar_produk);
							while ($n<$ht){
								if($gambar_produk[$n]!=""){
								?> 
					  <img src="../../../img_produk/<?php echo $gambar_produk[$n]; ?>" height="50px">
					  <?php
								}
								$n++;
								
							}
					  ?>
				 </td>
                  <td><?php echo $harga_produk ;?></td>
					
                  <td><?php echo $diskon_produk ;?></td>
                  <td><?php echo $stok_produk ;?></td>
                  <td>
					  <button class="btn btn-warning" onClick="edit_kain('<?php echo $id_produk; ?>')">Edit</button> 
					  <button class="btn btn-danger" onClick="hapus_kain('<?php echo $id_produk; ?>','<?php echo $gambar_produk_gabung; ?>')">Delete</button> 
				  </td>
                </tr>
					<?php }
					?>
					
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Gambar</th>
                  <th>Harga</th>
                  <th>Harga Setelah Diskon</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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