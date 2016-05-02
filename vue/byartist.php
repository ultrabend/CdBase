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
        <link href="css/portfolio-item.css" rel="stylesheet">
        <!-- Your CSS -->
        <link href="css/style.css" rel="stylesheet">
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
                <h1 class="page-header style0">Collection by Artists</h1>
              </div>
            </div>
        		<div class="row style1">
              <div class="col-md-12">
        				<div class="breadcrumb">
                  <a href="index.php?page=byartist&limit=A%">A</a>
                  <a href="index.php?page=byartist&limit=B%">B</a>
                  <a href="index.php?page=byartist&limit=C%">C</a>
                  <a href="index.php?page=byartist&limit=D%">D</a>
                  <a href="index.php?page=byartist&limit=E%">E</a>
                  <a href="index.php?page=byartist&limit=F%">F</a>
                  <a href="index.php?page=byartist&limit=G%">G</a>
                  <a href="index.php?page=byartist&limit=H%">H</a>
                  <a href="index.php?page=byartist&limit=I%">I</a>
                  <a href="index.php?page=byartist&limit=J%">J</a>
                  <a href="index.php?page=byartist&limit=K%">K</a>
                  <a href="index.php?page=byartist&limit=L%">L</a>
                  <a href="index.php?page=byartist&limit=M%">M</a>
                  <a href="index.php?page=byartist&limit=N%">N</a>
                  <a href="index.php?page=byartist&limit=O%">O</a>
                  <a href="index.php?page=byartist&limit=P%">P</a>
                  <a href="index.php?page=byartist&limit=Q%">Q</a>
                  <a href="index.php?page=byartist&limit=R%">R</a>
                  <a href="index.php?page=byartist&limit=S%">S</a>
                  <a href="index.php?page=byartist&limit=T%">T</a>
                  <a href="index.php?page=byartist&limit=U%">U</a>
                  <a href="index.php?page=byartist&limit=V%">V</a>
                  <a href="index.php?page=byartist&limit=W%">W</a>
                  <a href="index.php?page=byartist&limit=X%">X</a>
                  <a href="index.php?page=byartist&limit=Y%">Y</a>
                  <a href="index.php?page=byartist&limit=Z%">Z</a>
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
                        <a href="index.php?page=byartist&limit=A%">A</a>
                        <a href="index.php?page=byartist&limit=B%">B</a>
                        <a href="index.php?page=byartist&limit=C%">C</a>
                        <a href="index.php?page=byartist&limit=D%">D</a>
                        <a href="index.php?page=byartist&limit=E%">E</a>
                        <a href="index.php?page=byartist&limit=F%">F</a>
                        <a href="index.php?page=byartist&limit=G%">G</a>
                        <a href="index.php?page=byartist&limit=H%">H</a>
                        <a href="index.php?page=byartist&limit=I%">I</a>
                        <a href="index.php?page=byartist&limit=J%">J</a>
                        <a href="index.php?page=byartist&limit=K%">K</a>
                        <a href="index.php?page=byartist&limit=L%">L</a>
                        <a href="index.php?page=byartist&limit=M%">M</a>
                        <a href="index.php?page=byartist&limit=N%">N</a>
                        <a href="index.php?page=byartist&limit=O%">O</a>
                        <a href="index.php?page=byartist&limit=P%">P</a>
                        <a href="index.php?page=byartist&limit=Q%">Q</a>
                        <a href="index.php?page=byartist&limit=R%">R</a>
                        <a href="index.php?page=byartist&limit=S%">S</a>
                        <a href="index.php?page=byartist&limit=T%">T</a>
                        <a href="index.php?page=byartist&limit=U%">U</a>
                        <a href="index.php?page=byartist&limit=V%">V</a>
                        <a href="index.php?page=byartist&limit=W%">W</a>
                        <a href="index.php?page=byartist&limit=X%">X</a>
                        <a href="index.php?page=byartist&limit=Y%">Y</a>
                        <a href="index.php?page=byartist&limit=Z%">Z</a>
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
