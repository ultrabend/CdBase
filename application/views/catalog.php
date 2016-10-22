<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header style0">Collection</h1>
				<?php //print_r($albums); ?>
			</div>
		</div>
		<div class="row style1">
			<div class="col-md-12">
				<div class="breadcrumb">
				</div>
			</div>
		</div>
		<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Cover</th>
									<th>Artist/Band</th>
									<th>Album</th>
									<th>Date release</th>
									<th>label</th>
								</tr>
							</thead>
							<tbody>
								 <?php
								 $i=0;
								 foreach ($albums as $album) {
								 $i++;
								 $title=preg_replace('#[^0-9a-z]+#i', '-', $album['title']);
								 
								 echo "<tr>";
									echo "<td>".$i++."</td>";
									echo "<td><a href=".site_url('Cards/index/').$album['id']."><img src=".base_url().'/assets/img/covers/th_cdcover.jpg'."></a></td>";
									echo "<td>".$album['name']."</td>";
									echo "<td>".$album['title']."</td>";
									echo "<td>".$album['year']."</td>";
									echo "<td>".$album['label']."</td>";
								echo "</tr>";
										}
									?>
							</tbody>
						</table>
							<div class="breadcrumb">

							</div>
					</div>

					</div>
					</div>
				</div>
		</div>
	</div>
</div>
