<?php require_once 'includes/header.php'; ?>
<!--
- tombol search (supplier dan category)
-->
<!--  <link rel="stylesheet" href="lteasset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">-->

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="dashboard.php">Home</a></li>		  
			<li class="active">Product</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addProductModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th>Product ID</th>
							<th>Product Namev></th>
							<th>Qty</th>
							<th>Price</th>
							<th>Category ID</th>
							<th>Supplier ID</th>
							<th>Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addProductModel" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="submitProductForm" action="php_action/createProducts.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
				</div>
				<div class="modal-body">

					<div id="add-Product-messages"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Product Name </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="productname" placeholder="Product Name" name="productname" autocomplete="off">
						</div>
					</div> <!-- /form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label">Qty </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="qty" pattern="[0-9]+" placeholder="Qty" name="qty" autocomplete="off">
						</div>
					</div> <!-- /form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label">Price </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="price" pattern="[0-9]+" placeholder="Price" name="price" autocomplete="off">
						</div>
					</div> <!-- /form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label">Category ID </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="cid" readonly placeholder="Category ID" name="cid" autocomplete="off">
						</div>
						<div class="col-sm-1" style="margin-left:-20px;">
							<button type="button" id="searchCid" name="searchCid" onclick="searchCategory();" data-toggle="modal" data-target="#searchC" data-backdrop="static" data-keyboard="false" class="btn btn-default glyphicon glyphicon-search"></button>
						</div>	
					</div> <!-- /form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label">Supplier ID </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="sid" readonly placeholder="Category ID" name="sid" autocomplete="off">
						</div>
						<div class="col-sm-1" style="margin-left:-20px;">
							<button type="button" id="searchsid" name="searchsid" onclick="searchCategory();" data-toggle="modal" data-target="#searchS" data-backdrop="static" data-keyboard="false" class="btn btn-default glyphicon glyphicon-search"></button>
						</div>	
						
					</div> <!-- /form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label">Status </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<select class="form-control" id="status" name="status">
								<option value="Available">Available</option>
								<option value="Unavailable">Unavailable</option>
							</select>
						</div>
					</div> <!-- /form-group-->         	        

				</div> <!-- /modal-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

					<button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off" onClick="window.location.reload();">Save Changes</button>
				</div>
				<!-- /modal-footer -->
			</form>
			<!-- /.form -->
		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit Product -->
<div class="modal fade" id="editProductModel" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="editProductForm" action="php_action/editProducts.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product</h4>
				</div>
				<div class="modal-body">

					<div id="edit-Product-messages"></div>

					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

					<div class="edit-Product-result">
						<div class="form-group">
							<label class="col-sm-3 control-label">Product ID: </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pid" placeholder="Product id" name="pid" disabled>
							</div>
						</div> <!-- /form-group-->
						<div class="form-group">
							<label class="col-sm-3 control-label">Product Name: </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="editProductName" placeholder="Product Name" name="editProductName" autocomplete="off">
							</div>
						</div> <!-- /form-group-->
						<div class="form-group">
							<label class="col-sm-3 control-label">Qty </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" pattern="[0-9]+" id="editQty" placeholder="Qty" name="editQty" autocomplete="off">
							</div>
						</div> <!-- /form-group-->
						<div class="form-group">
							<label class="col-sm-3 control-label">Price </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="editPrice" pattern="[0-9]+" placeholder="Price" name="editPrice" autocomplete="off">
							</div>
						</div> <!-- /form-group-->

						<div class="form-group">
						<label class="col-sm-3 control-label">Category ID </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="editCid" readonly placeholder="Category ID" name="editCid" autocomplete="off">
						</div>
						<div class="col-sm-1" style="margin-left:-20px;">
							<button type="button" id="searchCid" name="searchCid" onclick="searchCategory();" data-toggle="modal" data-target="#esearchC" data-backdrop="static" data-keyboard="false" class="btn btn-default glyphicon glyphicon-search"></button>
						</div>	
					</div> <!-- /form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label">Supplier ID </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" readonly id="editSid" placeholder="Category ID" name="editSid" autocomplete="off">
						</div>
						<div class="col-sm-1" style="margin-left:-20px;">
							<button type="button" id="searchsid" name="searchsid" onclick="searchCategory();" data-toggle="modal" data-target="#esearchS" data-backdrop="static" data-keyboard="false" class="btn btn-default glyphicon glyphicon-search"></button>
						</div>	
						
					</div>




							<div class="form-group">
								<label for="editProductStatus" class="col-sm-3 control-label">Status: </label>
								<label class="col-sm-1 control-label">: </label>
								<div class="col-sm-8">
									<select class="form-control" id="editStatus" name="editStatus">
										<option value="Available">Available</option>
										<option value="Unavailable">Not Available</option>
									</select>
								</div>
							</div>

					</div>         	        
					<!-- /edit brand result -->

				</div> <!-- /modal-body -->

				<div class="modal-footer editProductFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

					<button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..." autocomplete="off"  onClick="window.location.reload();"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				</div>
				<!-- /modal-footer -->
			</form>
			<!-- /.form -->
		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->


<script>
	function selectc(valu){
		document.getElementById('cid').value=valu;
	}
	function selects(valu){
		document.getElementById('sid').value=valu;
		
	}
</script>






<!-- Search Category -->
<div class="modal fade" id="searchC" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-search"></i> Search Category  </h4>
			</div>
			<div class="modal-body">

				<div id="searchC-messages"></div>

				<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
					<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<span class="sr-only">Loading...</span>
				</div>

				<div class="searchC-result">
					 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
								<th>Category ID</th>
								<th>Category Name </th>
								<th>Description</th>
								<th></th>
                </tr>
                </thead>
                <tbody>
							<?php
							$sql = "select * from categories";
							$query = $connect->query($sql);

							while($row = $query->fetch_array()) {
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td><button  onClick='selectc(".$row[0].")' data-dismiss='modal' class='btn btn-default'>Select</button></td>";
								echo "</tr>";
							}
							?>
                </tbody>
                <tfoot>
                <tr>
								<th>Category ID</th>
								<th>Category Name </th>
								<th>Description</th>
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







<!-- Search Category -->
<div class="modal fade" id="searchS" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-search"></i> Search Supplier</h4>
			</div>
			<div class="modal-body">

				<div id="searchC-messages"></div>

				<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
					<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<span class="sr-only">Loading...</span>
				</div>

				<div class="searchC-result">
					 <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr> 
								<th>Supplier ID</th>
								<th>Supplier Name </th>
								<th>Supplier Contact</th>
								<th></th>
                </tr>
                </thead>
                <tbody>
							<?php
							$sql = "select * from supplier";
							$query = $connect->query($sql);

							while($row = $query->fetch_array()) {
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td><button  onClick='selects(".$row[0].")' data-dismiss='modal' class='btn btn-default'>Select</button></td>";
								echo "</tr>";
							}
							?>
                </tbody>
                <tfoot>
                <tr>
								<th>Supplier ID</th>
								<th>Supplier Name </th>
								<th>Supplier Contact</th>
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

























<script>
	function eselectc(valu){
		document.getElementById('editCid').value=valu;
	}
	function eselects(valu){
		document.getElementById('editSid').value=valu;
		
	}
</script>






<!-- Search Category -->
<div class="modal fade" id="esearchC" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-search"></i> Search Category </h4>
			</div>
			<div class="modal-body">

				<div id="searchC-messages"></div>

				<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
					<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<span class="sr-only">Loading...</span>
				</div>

				<div class="searchC-result">
					 <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
								<th>Category ID</th>
								<th>Category Name </th>
								<th>Description</th>
								<th></th>
                </tr>
                </thead>
                <tbody>
							<?php
							$sql = "select * from categories";
							$query = $connect->query($sql);

							while($row = $query->fetch_array()) {
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td><button  onClick='eselectc(".$row[0].")' data-dismiss='modal' class='btn btn-default'>Select</button></td>";
								echo "</tr>";
							}
							?>
                </tbody>
                <tfoot>
                <tr>
								<th>Category ID</th>
								<th>Category Name </th>
								<th>Description</th>
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







<!-- Search Category -->
<div class="modal fade" id="esearchS" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-search"></i> Search Supplier</h4>
			</div>
			<div class="modal-body">

				<div id="searchC-messages"></div>

				<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
					<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<span class="sr-only">Loading...</span>
				</div>

				<div class="searchC-result">
					 <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr> 
								<th>Supplier ID</th>
								<th>Supplier Name </th>
								<th>Supplier Contact</th>
								<th></th>
                </tr>
                </thead>
                <tbody>
							<?php
							$sql = "select * from supplier";
							$query = $connect->query($sql);

							while($row = $query->fetch_array()) {
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td><button  onClick='eselects(".$row[0].")' data-dismiss='modal' class='btn btn-default'>Select</button></td>";
								echo "</tr>";
							}
							?>
                </tbody>
                <tfoot>
                <tr>
								<th>Supplier ID</th>
								<th>Supplier Name </th>
								<th>Supplier Contact</th>
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


















<!-- /edit brand -->

<!-- DataTables -->
<!--<script src="lteasset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>-->
<script src="lteasset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
 
 
    $('#example3').DataTable()
    $('#example4').DataTable()
  })
</script>

<script src="custom/js/products.js"></script>

<?php require_once 'includes/footer.php'; ?>