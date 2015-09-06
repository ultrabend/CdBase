<?php
	if (!empty($_GET['page']) && is_file('control/'.$_GET['page'].'.php'))
	{
	        include 'control/'.$_GET['page'].'.php';
	}
	else
	{
	        include 'control/home.php';
	}

 ?>
