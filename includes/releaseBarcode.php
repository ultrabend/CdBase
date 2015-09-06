		<div class="widget-container widget_search styled boxed-velvet">
			<table class='table'>
				<thead>
					<tr>
						<td></td>
						<td>Release</td>
						<td>Artist</td>
						<td>Format</td>
						<td>Media</td>
						<td>Tracks</td>
						<td>Date</td>
						<td>Country</td>
						<td>Barcode</td>
						<td>Label</td>
						<td>Import</td>
					</tr>
				</thead>
				<tbody>
			<?php
			if (isset($_POST['barcode'])) {
				$instance = new MusicBrainz;
				$data = $instance->BarcodeSearch($_POST['barcode']);
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
					if (isset($data['releases'][$i]['date'])) {
						$_SESSION['album'][$i]['date'] = $data['releases'][$i]['date'];
					}
					else{
						$_SESSION['album'][$i]['date'] = "";
					}
					if (isset($data['releases'][$i]['barcode'])) {
						$_SESSION['album'][$i]['barcode'] = $data['releases'][$i]['barcode'];
					}
					if (isset($data['releases'][$i]['media'][0]['format'])) {
						$_SESSION['album'][$i]['format'] = $data['releases'][$i]['media'][0]['format'];
					}
					if (isset($data['releases'][$i]['count'])) {
						$_SESSION['album'][$i]['disc'] = $data['releases'][$i]['count'];
					}
					if (isset($data['releases'][$i]['track-count'])) {
						$_SESSION['album'][$i]['tracks'] = $data['releases'][$i]['track-count'];
					}
					if (isset($data['releases'][$i]['country'])) {
						$country = $data['releases'][$i]['country'];
					}
					else{
						$country="";
					}
					if (isset($data['releases'][$i]['label-info'][0]['label']['name'])) {
						$_SESSION['album'][$i]['label'] = $data['releases'][$i]['label-info'][0]['label']['name'];
					}
				?>
					<tr>
						<td><?php echo $i+1; ?></td>
						<td><?php echo $_SESSION['album'][$i]['title']; ?></td>
						<td><?php echo $_SESSION['album'][$i]['artist'];?></td>
						<td><?php echo $_SESSION['album'][$i]['format'];?></td>
						<td><?php echo $_SESSION['album'][$i]['disc'];?></td>
						<td><?php echo $_SESSION['album'][$i]['tracks'];?></td>
						<td><?php echo $_SESSION['album'][$i]['date'];?></td>
						<td><?php echo $country;?></td>
						<td><?php echo $_SESSION['album'][$i]['barcode'];?></td>
						<td><?php echo $_SESSION['album'][$i]['label'];?></td>
						<td><a class='btn btn-sm btn-warning' href="includes/import_by_barcode.php?count=<?php echo $i; ?>">ok</a></td>
					</tr><?php
				}		?>
				</tbody>
			</table>
			<div>
			<?php
				if ($count==0) {
				trigger_error('no result', E_USER_WARNING);?>
				<div class='alert alert-warning'><strong><?php echo "MusicBrainz server timeout or no CD in database"; ?></strong></div>
			<?php 	} ?>
			</div>
		</div>
		<?php }	 ?>
