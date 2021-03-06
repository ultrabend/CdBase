<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header style0">Collection</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb">
				<?php 
					echo $this->pagination->create_links();
				 ?>
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
									<th>Artists</th>
									<th>Release</th>
									<th>Date release</th>
									<th>label</th>
								</tr>
							</thead>
							<tbody>
							<span data-tilt></span>
								<?php
								$i=$page;
								foreach ($albums as $album) {
								$i++;
								$title=$album['title'];
								echo "<tr>";
								echo "<td>".$i."</td>";
			                    $album['title']= preg_replace('#[^0-9a-z]+#i', '-', $album['title']);
								$file="assets/img/covers/".$album['title']."_front.jpg";
                               	if (file_exists($file)) {
                                	echo "<td data-tilt data-tilt-scale='1.2'><a href=".site_url('Cards/index/').$album['id']."><img class='shadow' width='100px' src=".base_url().$file."></a></td>";
                               	}
                               	else{
                               		echo "<td><a href=".site_url('Cards/index/').$album['id']."><img src=".base_url().'/assets/img/covers/th_cdcover.jpg'."></a></td>";	
                               	}	
								echo "<td>".$album['name']."</td>";
								echo "<td>".$title."</td>";
								echo "<td>".$album['year']."</td>";
								echo "<td>".$album['label']."</td>";
								echo "</tr>";
										}
									?>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
</div>
