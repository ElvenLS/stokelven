<?php require_once 'includes/header.php'; ?>
<!--
- tombol search (supplier dan category)
-->
<!--  <link rel="stylesheet" href="lteasset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">-->

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="dashboard.php">Home</a></li>		  
			<li class="active">Low Product</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> View Low Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>			
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Qty</th>
							<th>Price</th>
							<th>Category ID</th>
							<th>Supplier ID</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$lowStockSql = "SELECT * FROM products WHERE qty <= 3 AND status='available'";
						$result = $connect->query($lowStockSql);

						if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
							$activeProduct = ""; 

							while($row = $result->fetch_array()) {
								$productId = $row[0];
 	// active 
								if($row[6] == "Available") {
 		// activate member
									$activeProduct = "<label class='label label-success'>Available</label>";
								} else {
 		// deactivate member
									$activeProduct = "<label class='label label-danger'>Not Available</label>";
								}
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."</td>";
								echo "<td>".$row[4]."</td>";
								echo "<td>".$row[5]."</td>";
								echo "<td>".$activeProduct."</td>";
								echo "</tr>";
							}
						}


						?>
					</tbody>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<?php require_once 'includes/footer.php'; ?>