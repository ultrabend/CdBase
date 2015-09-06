		<div class="widget-container widget_search styled boxed-velvet">
			<table class='table'>
				<thead>
					<tr>
						<td></td>
						<td>Cd Id</td>
						<td>Release</td>
						<td>Artist</td>
						<td>Format</td>
						<td>Media</td>
						<td>Tracks</td>
						<td>Date</td>
						<td>Country</td>
						<td>Barcode</td>
						<td>Import</td>
					</tr>
				</thead>
				<tbody>
			<?php
			if (isset($_POST['album'])) {
				$instance = new MusicBrainz;
				$data = $instance->ReleaseSearch($_POST['album'],$_POST['artist']);
				$count= sizeof($data['releases']);
				for ($i=0; $i < $count; $i++) {
					if (isset($data['releases'][$i]['id'])){
						$_SESSION['album'][$i]['id'] = $data['releases'][$i]['id'];
					}
					if (isset($data['releases'][$i]['title'])){
						$_SESSION['album'][$i]['title'] = $data['releases'][$i]['title'];
					}
					if (isset($data['releases'][$i]['artist-credit'][0]['artist']['name'])) {
						$_SESSION['album'][$i]['artist'] = $data['releases'][$i]['artist-credit'][0]['artist']['name'];
					}
					else {
						$_SESSION['album'][$i]['artist'] ='';
					}
					if (isset($data['releases'][$i]['date'])) {
						$_SESSION['album'][$i]['date'] = $data['releases'][$i]['date'];
					}
					else {
						$_SESSION['album'][$i]['date']='';
					}
					if (isset($data['releases'][$i]['barcode'])) {
						$_SESSION['album'][$i]['barcode'] = $data['releases'][$i]['barcode'];
					}
					else {
						$_SESSION['album'][$i]['barcode']='';
					}
					if (isset($data['releases'][$i]['media'][0]['format'])) {
						$_SESSION['album'][$i]['format'] = $data['releases'][$i]['media'][0]['format'];
					}
					else {
						$_SESSION['album'][$i]['format']='';
					}
					if (isset($data['releases'][$i]['count'])) {
						$_SESSION['album'][$i]['disc'] = $data['releases'][$i]['count'];
					}
					else {
						$_SESSION['album'][$i]['disc']='';
					}
					if (isset($data['releases'][$i]['track-count'])) {
						$_SESSION['album'][$i]['tracks'] = $data['releases'][$i]['track-count'];
					}
					else {
						$_SESSION['album'][$i]['tracks'] ='';
					}
					if (isset($data['releases'][$i]['country'])) {
						$country = $data['releases'][$i]['country'];
					}
					else {
						$country='';
					}
				?>
					<tr>
						<td><?php echo $i+1; ?></td>
						<td><?php echo $_SESSION['album'][$i]['id']; ?></td>
						<td><?php echo $_SESSION['album'][$i]['title']; ?></td>
						<td><?php echo $_SESSION['album'][$i]['artist'];?></td>
						<td><?php echo $_SESSION['album'][$i]['format'];?></td>
						<td><?php echo $_SESSION['album'][$i]['disc'];?></td>
						<td><?php echo $_SESSION['album'][$i]['tracks'];?></td>
						<td><?php echo $_SESSION['album'][$i]['date'];?></td>
						<td><?php echo $country;?></td>
						<td><?php echo $_SESSION['album'][$i]['barcode'];?></td>
						<td><a class='btn btn-sm btn-warning' href="includes/import_by_title.php?id=<?php echo $_SESSION['album'][$i]['id']; ?>&cd=<?php echo $i; ?>">ok</a></td>
					</tr><?php
				}
				?>
				</tbody>
			</table>
			<div>
<?php 				if ($count==0) {?>
				<div class='alert alert-warning'><strong><?php echo "OOPS ! MusicBrainz server timeout or no cd in database, Please try again"; ?></strong></div>

					<?php 		} ?>
			</div>
		</div>
		<?php }	 ?>
