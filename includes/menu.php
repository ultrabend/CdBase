        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" /></a>
            </div>
            <ul class="nav navbar-right top-nav">
              <a href="index.php?page=catalog"><img src="img/catalog.png" alt="Catalog" /></a>
              <a href="index.php?page=byartist"><img src="img/byartist.png" alt="By artist" /></a>
              <img src="img/hand.png" alt="By artist"/>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#first"><i class="fa fa-fw fa-edit"></i>Collection<i class="fa fa-fw fa-caret-down"></i></a>
                      <ul id="first" class="collapse">
                          <li>
                              <a href="index.php?page=catalog"><i class="fa fa-fw fa-table"></i> Catalog</a>
                          </li>
                          <li>
                              <a href="index.php?page=byartist"><i class="fa fa-fw fa-user"></i> By artist</a>
                          </li>
                      </ul>
                  </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#Add"><i class="fa fa-fw fa-edit"></i> Add a CD <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="Add" class="collapse">
                            <li>
                                <a href="index.php?page=barcode">By barcode</a>
                            </li>
                            <li>
                                <a href="index.php?page=bytitle">By album title</a>
                            </li>
                            <li>
                                <a href="index.php?page=addcd">By yourself</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
