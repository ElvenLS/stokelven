<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


if($_GET['o'] == 'add') { 
// add order
	echo "<div class='div-request div-hide'>add</div>";
} else if($_GET['o'] == 'red') { 
// reduce order
	echo "<div class='div-request div-hide'>red</div>";
} 
?>

<ol class="breadcrumb">
	<li><a href="dashboard.php">Home</a></li>
	<li>Order</li>
	<li class="active">
		<?php if($_GET['o'] == 'add') { ?>
			Barang Masuk
			<?php } else if($_GET['o'] == 'red') { ?>
				Barang Keluar
				<?php } // /else manage order ?>
			</li>
		</ol>


		<h4 >
			<i class='glyphicon glyphicon-circle-arrow-right'></i>
			<?php if($_GET['o'] == 'add') {
				echo "Barang Masuk";
			} else if($_GET['o'] == 'red') { 
				echo "Barang Keluar";
			} 
			?>	
		</h4>

		<!-- fungsi bawaan yang tidak saya gunakaan bisa anda hapus atau kembangkan -->
		<script>
			function selectp(valu){
				document.getElementById('pid').value=valu;
			}
			function selectn(valu){
				document.getElementById('pname').value=valu;
			}
			function selects(valu){
				document.getElementById('sid').value=valu;
			}
			function selectc(valu){
				document.getElementById('sid').value=valu;
			}
			function selectq(valu){
				document.getElementById('sid').value=valu;
			}
			

		</script>
<?php if($_GET['o'] == 'add') {
	$warna="rgba(37,196,19,0.67)";
 } else if($_GET['o'] == 'red') {
	$warna="rgba(239,130,132,0.69)";
}else{
	$watna="#DDDDDD";
}
?>
		<div class="panel panel-default" >
			<div class="panel-heading" style="background: <?php echo $warna; ?> ">
				<?php if($_GET['o'] == 'add') { ?>
					<i class="glyphicon glyphicon-plus-sign"></i>Barang Masuk
					<?php } else if($_GET['o'] == 'red') { ?>
						<i class="glyphicon glyphicon-edit"></i> Barang Keluar
						<?php } else if($_GET['o'] == 'manord') { ?>
							<i class="glyphicon glyphicon-edit"></i> Manage Order
							<?php } else if($_GET['o'] == 'editOrd') { ?>
								<i class="glyphicon glyphicon-edit"></i> Edit Order
								<?php } ?>

							</div>	
							<div class="panel-body">

								 <?php 
								 // if($_GET['o'] == 'add') { 
			// add order
									?>	

									<div class="success-messages"></div> <!--/success-messages-->
									<form action="">
										<table class="table" id="productTable">
											<thead>
												<tr>			  			
													<th style="width:15%;">Productid</th>
													<th style="width:5%;"></th>
													<th style="width:15%;">Name</th>
													<th style="width:15%;">Supplier</th>			  			
													<th style="width:15%;">Category</th>			  			
													<th style="width:15%;">Qty</th>
													<th style="width:15%;">Quantity</th>
													<th style="width:5%;"></th>			  			
												</tr>
											</thead>



											<!-- php script yang tidak saya gunakan saya buat comment biar tidak mengganggu jalannya script -->

				
										<?php
										if($_GET['o'] == 'red') {
											echo '<div id="status" style="display:none">keluar</div>';
										} else{
											echo '<div id="status" style="display:none">masuk</div>';
										}
									// $arrayNumber = 0;
									// for($x = 1; $x < 2; $x++) { ?>
										<!-- <tr id="row <?php 
										// echo $x; ?>" class="<?php 
										// echo $arrayNumber; ?>">		 -->  	
											<tbody id="post">
											<tr id="1">
											<td style="margin-left:20px;">
												<div class="form-group">
													<input type="text" class="form-control" id="pid" onchange="cek_database(1)" name="pid" autocomplete="off" required>
												</div>
											</td>
											<td style="margin-left:0px">
												<button type="button" id="searchPid" name="searchPid" onclick="searchButton(1)" data-toggle="modal" data-target="#searchP" class="btn btn-default glyphicon glyphicon-search" data-backdrop="static" data-keyboard="false"></button>
											</td>
											<td style="padding-left:20px;">			  					
												<input type="text" name="pname" id="pname" autocomplete="off" disabled="true" class="form-control" />		  								
											</td>
											<td style="padding-left:20px;">
												<div class="form-group">
													<!-- <input type="number" name="sid" id="sid" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" disabled="true" class="form-control" min="1" /> -->
													<input type="text" name="sid" id="sid" autocomplete="off" disabled="true" class="form-control" min="1" />
												</div>
											</td>
											<td style="padding-left:20px;">			  					
												<input type="text" name="cid" id="cid" autocomplete="off" class="form-control" disabled="true" />			  					
											</td>
											<td style="padding-left:20px;">			  					
												<input type="number" name="pqty" id="pqty" class="form-control" readonly="true" />			  					
												<!-- <input type="hidden" name="totalqty" id="totalqty" autocomplete="off" class="form-control" /> -->		
											</td>
											<td style="padding-left:20px;">
												<div class="form-group">
													<!-- <input type="number" name="quantity" id="quantity" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" /> -->
													<input type="number" name="quantity" id="quantity" autocomplete="off" class="form-control" min="1" onchange="cekBarang(1)" required />
												</div>
											</td>
											<td>
												<!-- <button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button> -->
												<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(1)"><i class="glyphicon glyphicon-trash"></i></button>
											</td>
										</tr>
											<?php
													// $arrayNumber++;
			  		// } // /fos
			  		?> 
			  	</tbody>			  	
			  </table>
			</form>

			

			<!-- saya rubah dan tambahkan sebuah fungsi javascript yang benar -->

			<script type="text/javascript">
				function cek_database(value){
					element = $('tr#'+value).find('#pid').val()
					$.ajax({
						url: 'js_action/fungsiphp/cekdata.php',
						type: 'POST',
						dataType: 'JSON',
						data: {id: element},
						success: function(data){
							if(data.length == 0){
								alert("product id "+element+" tidak ada")
							}

							$('tr#'+value).find('#pname').val(data[0].name)
							$('tr#'+value).find('#sid').val(data[0].suppliername)
							$('tr#'+value).find('#cid').val(data[0].categories_name)
							$('tr#'+value).find('#pqty').val(data[0].qty)
						}
						// complete: function(data){
						// 	var status = $('#status').text()
						// 	var pqty = $('tr#'+value).find('#pqty').val()
						// 		if (status == 'keluar' && pqty <= 3) {
						// 			$('#status').after('<div class="alert alert-warning alert-dismissible">'+
						// 			  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
						// 			  'Jumlah barang '+$('tr#'+value).find('#pname').val()+' yang ada tersisa sedikit'+
						// 			'</div>')
						// 		}
						// }
					})
				}
			</script>

			<!-- fungsi bawaan yang tidak saya gunakaan bisa anda hapus atau kembangkan -->

			<script type="text/javascript">
				function isi_otomatis(){
					var pid = $("#pid").val();
					$.ajax({
						url: 'php_action/fetchProductTrans.php',
						data:"pid="+pid 
					}).done(function (data) {
						var json = data,
						obj = JSON.parse(json);
						$('#pname').val(obj.nama);
						$('#cid').val(obj.jurusan);
						$('#sid').val(obj.alamat);
						$('#pqty').val(obj.alamat);
					});
				}
			</script>
			<div class="form-group submitButtonFooter">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="button" class="btn btn-default addRowBtn" onclick="addRow()" id="addRowBtn" name="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>
					<?php if($_GET['o'] == 'add') {
					echo '<button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>';
				} else {
					echo '<button type="submit" id="kurangiProduct" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>';
				}
					?>

					<button type="reset" id="reset" class="btn btn-default"><i class="glyphicon glyphicon-erase"></i> Reset</button>
				</div>
			</div>
		</form>
		<?php 
	// } 

		// else if($_GET['o'] == 'red') { 
			
			?>			

			

			<?php
		// }  ?> 






		<!-- Search Product-->
		<div class="modal fade" id="searchP" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-search"></i> Search Product </h4>
					</div>
					<div class="modal-body">

						<div id="searchP-messages"></div>

						<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
							<span class="sr-only">Loading...</span>
						</div>

						<div class="searchP-result">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Product ID</th>
										<th>Product Name </th>
										<th>Supplier Name </th>
										<th>Category Name </th>
										<th>Qty</th>

										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "select productid, name, qty, supplier.suppliername, categories.categories_name from products join supplier on products.supplierid = supplier.supplierid join categories on products.categoryid = categories.categories_id";
									$query = $connect->query($sql);

									while($row = $query->fetch_array()) {
										echo "<tr id='addr0'>";
										echo "<td>".$row[0]."</td>";
										echo "<td>".$row[1]."</td>";
										echo "<td>".$row[3]."</td>";
										echo "<td>".$row[4]."</td>";
										echo "<td>".$row[2]."</td>";
										// echo "<td><button  onClick='selectp(".$row[0].");selectn(".$row[1].");selects(".$row[3].");selectc(".$row[4].");selectq(".$row[2].")' data-dismiss='modal' class='btn btn-default'>Select</button></td>";
										echo "<td><button onclick='insertData(".$row[0].")' data-dismiss='modal' class='btn btn-default'>Select</button></td>";
										echo "</tr>";
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>Product ID</th>
										<th>Product Name </th>
										<th>Supplier ID </th>
										<th>Category ID </th>
										<th>Qty</th>

										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>         	        
						<!-- /edit brand result -->

					</div> <!-- /modal-body -->
				</div>
				<!-- /modal-content -->
			</div>
			<!-- /modal-dailog -->
		</div>
		<!-- / add modal -->

		<!-- penambahan javascript -->
		<script type="text/javascript" src="js_action/orders.js"></script>


		<?php require_once 'includes/footer.php'; ?>

