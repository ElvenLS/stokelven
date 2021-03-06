<?php 
error_reporting(0);
include "../../../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" onLoad="ref_kain()">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Admin</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown user user-menu">
            <a href="../../../logout.php">
              <span class="hidden-xs">Logout</span>
            </a>
            
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="background-color: 	#D1DEEA;">
          <img src="../../../img/logonew.png" class="img-responsive"  alt="User Image">
        
        
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
		<li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>DashBoard</span>
            </span>
          </a>
		</li>
		<li>
          <a href="user.php">
            <i class="fa fa-user"></i> <span>User</span>
            </span>
          </a>
		</li>
		<li>
          <a href="kain.php">
            <i class="glyphicon glyphicon-oil"></i> <span>Kain</span>
            </span>
          </a>
		</li>
		<li>
          <a href="model.php">
            <i class="glyphicon glyphicon-scissors"></i> <span>Model</span>
            <span class="pull-right-container">
            </span>
          </a>
		</li>
		<li>
          <a href="transaksi.php">
            <i class="fa fa-money"></i> <span>Transaksi</span>
            <span class="pull-right-container">
            </span>
          </a>
		</li>
		</ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kain
				<button class="btn btn-success" onClick="tambah_kain()">Tambah kain</button>
        <small></small>
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
		-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12"> 
          <!-- /.box -->
			<script>
				function ref_kain(){
					$.ajax({
						type: "POST",
						url: "kain-tampil.php", 
						data: {kosong:'kosong'},
						dataType: "text",  
						cache:false,
						success: 
						function(data){
							$('#ubah').html(data);
						//alert(data);  //as a debugging message.
					}
				  });// you have missed this bracket
					return false;
				}
			function tambah_kain(){
					$.ajax({
						type: "POST",
						url: "kain-tambah.php", 
						data: {kosong:'kosong'},
						dataType: "text",  
						cache:false,
						success: 
						function(data){
							$('#ubah').html(data);
						//alert(data);  //as a debugging message.
					}
				  });// you have missed this bracket
					return false;
				}
			function edit_kain(id_kain){
					$.ajax({
						type: "POST",
						url: "kain-edit.php", 
						data: {idkain: id_kain},
						dataType: "text",  
						cache:false,
						success: 
						function(data){
							$('#ubah').html(data);
						//alert(data);  //as a debugging message.
					}
				  });// you have missed this bracket
					return false;
				}
				
				
			function hapus_kain(id_kain,gam){
				var cek = confirm('Apakah anda yakin ingin menghapus data ini?');
				if(cek==true){
					$.ajax({
						type: "POST",
						url: "kain-act.php", 
						data: {
								idkain: id_kain,
								tombol:'delete',
								gam: gam
						},
						dataType: "text",  
						cache:false,
						success: 
						function(data){
							$('#ubah').html(data);
						ref_kain();
						//alert(data);  //as a debugging message.
					}
				  });// you have missed this bracket
					return false;
				}
				}
			</script>
          <div class="box row" id="ubah">
            <!-- /.box-header -->
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Ratu Textile</b> 2.4.0
    </div>
    <strong><a href="https://adminlte.io"></a>.</strong> 
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="../../bower_components/ckeditor/ckeditor.js"></script>


<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- page script -->
<script src="../../bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>


<script>
  $(function () {
	  $('.textarea').wysihtml5(),
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


</body>
</html>
