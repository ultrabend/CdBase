<?php
	session_start();
	$_SESSION['album']=array();
	include('musicbrainz.php');
	$instance = new MusicBrainz;
	error_reporting(0);
	?>
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
				$data = $instance->ReleaseSearch($_POST['album']);
				$count= $data['count'];
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
						$artist ='';
					}
					if (isset($data['releases'][$i]['date'])) {
						$_SESSION['album'][$i]['date'] = $data['releases'][$i]['date'];
					}
					else {
						$date='';
					}
					if (isset($data['releases'][$i]['barcode'])) {
						$_SESSION['album'][$i]['barcode'] = $data['releases'][$i]['barcode'];
					}
					else {
						$barcode='';
					}
					if (isset($data['releases'][$i]['media'][0]['format'])) {
						$_SESSION['album'][$i]['format'] = $data['releases'][$i]['media'][0]['format'];
					}
					else {
						$format='';
					}
					if (isset($data['releases'][$i]['count'])) {
						$_SESSION['album'][$i]['disc'] = $data['releases'][$i]['count'];
					}
					else {
						$format='';
					}
					if (isset($data['releases'][$i]['track-count'])) {
						$_SESSION['album'][$i]['tracks'] = $data['releases'][$i]['track-count'];
					}
					else {
						$tracks='';
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
						<td><a class='btn btn-sm btn-warning' href="includes/import_by_title.php?release=<?php echo $album; ?>&id=<?php echo $_SESSION['album'][$i]['id']; ?>&cd=<?php echo $i; ?>">ok</a></td>
					</tr><?php
				}
				?>
				</tbody>
			</table>
			<div>
<?php 				if ($count==0) {?>
				<div class='alert alert-warning'><strong><?php echo "MusicBrainz server timeout"; ?></strong></div>

					<?php 		} ?>
			</div>
		</div>
		<?php }	 ?>
