<?php require_once 'includes/user_header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>		  
			<li class="active">Category</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> View category</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>			
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th>Category ID <div class="glyphicon glyphicon-sort"></div></th>							
							<th>Category Name <div class="glyphicon glyphicon-sort"></div></th>
							<th>Description <div class="glyphicon glyphicon-sort"></div></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$lowStockSql = "SELECT * FROM categories";
						$result = $connect->query($lowStockSql);

						if($result->num_rows > 0) { 
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
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