<?php
	session_start();
	include("musicbrainz.php");
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
						<td>Label</td>
						<td>Barcode</td>
						<td>Import</td>
					</tr>
				</thead>
				<tbody>
			<?php
			if (isset($_POST['barcode'])) {
				$barcode=$_POST['barcode'];
				$data = $instance->BarcodeSearch($_POST['barcode']);
				$i=0;
					if (isset($data['releases'][$i]['id'])){
						$_SESSION['barcode'][$i]['id'] = $data['releases'][$i]['id'];
					}
					if (isset($data['releases'][$i]['title'])){
						$_SESSION['barcode'][$i]['title'] = $data['releases'][$i]['title'];
					}
					if (isset($data['releases'][$i]['artist-credit'][0]['artist']['name'])) {
						$_SESSION['barcode'][$i]['artist'] = $data['releases'][$i]['artist-credit'][0]['artist']['name'];
					}
					if (isset($data['releases'][$i]['date'])) {
						$_SESSION['barcode'][$i]['date'] = $data['releases'][$i]['date'];
					}
					if (isset($data['releases'][$i]['barcode'])) {
						$_SESSION['barcode'][$i]['barcode'] = $data['releases'][$i]['barcode'];
					}
					if (isset($data['releases'][$i]['media'][0]['format'])) {
						$_SESSION['barcode'][$i]['format'] = $data['releases'][$i]['media'][0]['format'];
					}
					if (isset($data['releases'][$i]['label-info'][0]['label']['name']));
						$_SESSION['barcode'][$i]['label'] = $data['releases'][$i]['label-info'][0]['label']['name'];;
					}
					if (isset($data['releases'][$i]['track-count'])) {
						$_SESSION['barcode'][$i]['tracks'] = $data['releases'][$i]['track-count'];
					}
					if (isset($data['releases'][$i]['media'][0]['disc-count'])) {
						$_SESSION['barcode'][$i]['disc'] = $data['releases'][$i]['media'][0]['disc-count'];
					}
					?>
					<tr>
						<td><?php echo $i+1; ?></td>
						<td><?php echo $_SESSION['barcode'][$i]['id']; ?></td>
						<td><?php echo $_SESSION['barcode'][$i]['title']; ?></td>
						<td><?php echo $_SESSION['barcode'][$i]['artist'];?></td>
						<td><?php echo $_SESSION['barcode'][$i]['format'];?></td>
						<td><?php echo $_SESSION['barcode'][$i]['disc'];?></td>
						<td><?php echo $_SESSION['barcode'][$i]['tracks'];?></td>
						<td><?php echo $_SESSION['barcode'][$i]['date'];?></td>
						<td><?php echo $_SESSION['barcode'][$i]['label'];?></td>
						<td><?php echo $_SESSION['barcode'][$i]['barcode'];?></td>
						<td><a class='btn btn-sm btn-danger' href="includes/import_by_barcode.php?barcode=<?php echo $barcode; ?>">Save</a></td>
					</tr><?php
				?>
				</tbody>
			</table>
			<div>
<?php 				if (!$_SESSION['barcode'][$i]['id']) {?>
				<div class='alert alert-warning'><strong><?php echo "NOT FOUND or server overload"; ?></strong></div>

					<?php 		} ?>
			</div>
		</div>
