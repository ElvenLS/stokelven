<?php require_once 'includes/user_header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>		  
			<li class="active">Supplier</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> View Supplier</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>			
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th>Supplier ID <div class="glyphicon glyphicon-sort"></div></th>							
							<th>Supplier Name <div class="glyphicon glyphicon-sort"></div></th>
							<th>Contact <div class="glyphicon glyphicon-sort"></div></th>
							<th>Address <div class="glyphicon glyphicon-sort"></div></th>
							<th>NPWP <div class="glyphicon glyphicon-sort"></div></th>
							<th>PIC <div class="glyphicon glyphicon-sort"></div></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$lowStockSql = "SELECT * FROM supplier";
						$result = $connect->query($lowStockSql);

						if($result->num_rows > 0) { 
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."</td>";
								echo "<td>".$row[4]."</td>";
								echo "<td>".$row[5]."</td>";
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