<!DOCTYPE html>
<html lang="En">
    <head>
    	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="CdBase" />
        <meta name="keywords" content="music library" />
        <meta name="author" content="ultrabend" />

        <title>Ultrabend's world</title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Theme CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- Your CSS -->
        <link href="style.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="icon" href="img/favicon.ico" />
    </head>

    <body>
        <div id="wrapper">
        <?php include('includes/menu.php');?>
        <div id="page-wrapper">
        	<div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <h1 class="page-header style0">Collection</h1>
              </div>
            </div>
        		<div class="row style1">
              <div class="col-md-12">
                <div>
                  <p>You actually have <?php echo $stats." albums ! "; ?></p>
        			  </div>
        				<div class="breadcrumb">
                  <a href="index.php?page=catalog&limit=0">0</a>
        						<?php
        							for ($j=1; $j<=$pagemax ; $j++) {
        								echo " - "; ?>
        								<a href="index.php?page=catalog&limit=<?php echo $j*10 ?>"><?php echo $j ?></a>
        							<?php }
                      	echo " - "; ?>
                        <a href="index.php?page=catalog&limit=<?php echo $limit+10 ?>"> + </a>
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
                         foreach ($datas as $data) {
                         $i++;
                         $title=preg_replace('#[^0-9a-z]+#i', '-', $data['title']);
                         ?>
                         <tr>
                           <td><?php echo $i+$limit;?></td>
                           <td><a href="index.php?page=card&card=<?php echo $data['id_album']; ?>">
                             <?php
                               $file="img/covers/".$title."_front.jpg";
                               if (file_exists($file)) {
                                 echo"<img class='shadow' src='".$file."' width='100px'>";
                               }
                               else{
                                 echo"<img src='img/covers/cdcover.jpg' width='100px'>";
                               }?></td>
                           <td><?php echo $data['name'];?></td>
                           <td><?php echo $data['title'];?></td>
                           <td><?php echo $data['year'];?></td>
                           <td><?php echo $data['label'];?></td>
                         </tr>
                         <?php
                            }
                          ?>
                      </tbody>
                    </table>
                      <div class="breadcrumb">
                        <a href="index.php?state=list.php&limit=0">0</a>
                        <?php
                          for ($j=1; $j<=$pagemax ; $j++) {
                            echo " - "; ?>
                            <a href="index.php?page=catalog&limit=<?php echo $j*10 ?>"><?php echo $j ?></a>
                          <?php }
                          echo " - "; ?>
                          <a href="index.php?page=catalog&limit=<?php echo $limit+10 ?>"> + </a>
                      </div>
                  </div>

        					</div>
                	</div>
            		</div>
        		</div>
        	</div>
        </div>

        </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
