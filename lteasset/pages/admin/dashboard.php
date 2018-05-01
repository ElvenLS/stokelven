<?php 
error_reporting(0);
include "../../../koneksi.php";
?>
<!DOCTYPE html>
<html>
<script>
//	function sleep(tim){
//		var start = new Date().getTime();
//		for (var i = 0; i < 1e7; i++){
//			if((new Date().getTime() - start > tim)){
//				break;
//			}
//		}
//	}
function ref(){
	
				
	//sleep(10000);
			 $.ajax({
				type: "POST",
				url: "dashboard-tampil.php", 
				data: {kosong:'kosong'},
				dataType: "text",  
				cache:false,
				success: 
				function(data){
					$('#ubah').html(data);
					setTimeout(function(){ref();},3000);
                //alert(data);  //as a debugging message.
            }
          });// you have missed this bracket
			return false;
			
 }
</script>
	<head>
<!--<meta http-equiv="Refresh" content="10">-->
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
<body class="hold-transition skin-blue sidebar-mini" onLoad="ref()">
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
       Dashboard
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
				
				
			</script>
            <!-- /.box-header -->
			 <div id="ubah">
				 <?php 
					$search_jual=mysql_query("SELECT * FROM tb_jual where status = 'sudah transfer'");
				 		$tran=mysql_num_rows($search_jual);
					$search_kirim=mysql_query("SELECT * FROM tb_jual where status = 'sudah verifikasi'");
				 		$kirim=mysql_num_rows($search_kirim);
				 
					$search_jual=mysql_query("SELECT * FROM `tb_jual` where status = 'belum transfer'");
							while($jual=mysql_fetch_array($search_jual)){
												$id_jual = $jual[id_jual];
												$tgl_akhir = $jual[tgl_akhir_transfer];
								
					$tod= strtotime(date("d-m-Y H:i:s"));
					$tgl_ak= strtotime($tgl_akhir);
				
								if($tod>date($tgl_ak)){
									$sql=mysql_query("UPDATE `tb_jual` SET `status` = 'jatuh tempo' WHERE `tb_jual`.`id_jual` = $id_jual;");
									
									
							$search_temp=mysql_query("SELECT * FROM tb_jual_detil where id_jual='$id_jual'");
								while($temp=mysql_fetch_array($search_temp)){
									$id_barang = $temp[id_barang];
									$search_produk=mysql_query("SELECT * FROM tb_produk where id_produk='".$id_barang."' ");
									while($produk_detil=mysql_fetch_array($search_produk)){
										$nama_produk = $produk_detil[nama_produk];
										$harga_produk= $produk_detil[harga_produk];
										$stok_produk= $produk_detil[stok_produk];
									}

									
									$jumlah = $temp[jumlah];

									$sisa= $stok_produk+$jumlah;
									$sql=mysql_query("UPDATE `tb_produk` SET `stok_produk` = '$sisa' WHERE `tb_produk`.`id_produk` = $id_barang;");
									//echo "insert into tb_jual_detil values('','$id_jual','$id_user','$id_produk_cart','$warna','$tailor','$jumlah','$harga_produk','$model_harga','$total_harga')"."--OK--";


								}

								}
												
							}
				 
				 ?>
			   <div class="col-md-4 col-sm-8">
				  <div class="info-box" >
						<span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

					<div class="info-box-content">
					  <span class="info-box-text">Telah Di transfer</span>
					  <span class="info-box-number"><?php echo $tran ; ?></span>
					</div>
				<!-- /.info-box-content -->
				 </div>
			  <!-- /.info-box -->
			  </div>
			   <div class="col-md-3 col-sm-6">
				  <div class="info-box" >
						<span class="info-box-icon bg-blue"><i class="fa fa-car"></i></span>

					<div class="info-box-content">
					  <span class="info-box-text">Belum Kirim</span>
					  <span class="info-box-number"><?php echo $kirim ; ?></span>
					</div>
				<!-- /.info-box-content -->
				 </div>
			  <!-- /.info-box -->
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
    <strong><a href="https://adminlte.io"></a></strong> 
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
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="../../bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="../../dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
