        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">CDBase</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php?state=list.php"><i class="fa fa-fw fa-table"></i> Collection </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i> Add CD <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="index.php?state=importcdbarcode.php">With barcode</a>
                            </li>
                            <li>
                                <a href="index.php?state=importcdtitle.php">With album title</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
