<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header style0">Artists</h1>
			</div>
		</div>
		<div class="row style1">
			<div class="col-md-12">
				<div class="breadcrumb">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<th>Artists</th>
						</thead>
						<tbody>
							<?php
							//print_r($artists);die(); 
							foreach ($artists as $artist) {
								echo "<tr><td>".$artist['name']."</td></tr>";
							}

							 ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-9">
				
			</div>
		</div>
	</div>
</div>
