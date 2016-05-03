<!DOCTYPE html>
<html lang="En">
    <head>
    	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="CdBase" />
        <meta name="keywords" content="music library" />
        <meta name="author" content="ultrabend" />

        <title><?php echo $datas[0]['title']; ?></title>

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
                <div><h1 class="page-header"><?php echo $datas[0]['title']; ?></h1></div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <table>
                    <tr>
                      <td>
                        <?php
                          $file="img/covers/".$title."_front.jpg";
                          if (file_exists($file)) {
                            echo"<img class='shadow' src='img/covers/".$title."_front.jpg' width='100%'>";
                          }
                          else{
                            echo"<img class='shadow' src='img/covers/cdcover.jpg' width='100%'>";
                            ?>
                            <br>
                            <?php
                            echo"<br>";
                            echo"<a href='index.php?page=importcover&album=$title'><button type='button' class='btn btn-sm btn-warning'>Add Cover</button></a>";
                          }?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <br>
                        <form method="post">
                           <input type="submit" name="go" value="Delete" class='btn btn-sm btn-danger'>
                        </form>
                      </td>
                    </tr>
                  </table>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7">
                  <div class="row">
                    <div><h2><?php echo $datas[0]['name']; ?></h2></div>
          					<div>
          						<span><strong>Release date : </strong><?php echo $datas[0]['year']; ?></span><br>
                      <span><strong>Label : </strong><?php echo $datas[0]['label']; ?></span><br>
                      <span><strong>Tracks : </strong><?php echo $datas[0]['nb_tracks']; ?></span><br>
                      <span><strong>barcode : </strong><?php echo $datas[0]['barcode']; ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div><h3 class="page-header">Tracks</h3></div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <td>N°</td>
                            <td>Title</td>
                            <td>Duration</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($tracks AS $data) {
                              $i++; ?>
                              <tr>
                                <td><?php echo $tracks[$i]['id_track'] ?></td>
                                <td><?php echo $tracks[$i]['title'] ?></td>
                                <td><?php echo floor($tracks[$i]['duration'] /60000).' : '.floor(($tracks[$i]['duration'] % 60000)/1000) ?></td>
                              </tr>
                        <?php }
                        //$i++;
                           ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">

                </div>
              </div>
            </div>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
