<?php

include("../init.php");
include(DIR. "./admin/modules.php");

$modules = new modules();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration - pleep.net</title>
<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css" />
<style type="text/css">
body {
	padding-top: 60px;
	padding-bottom: 40px;
}
.sidebar-nav {
	padding: 9px 0;
}
 @media (max-width: 980px) {
/* Enable use of floated navbar text */
        .navbar-text.pull-right {
	float: none;
	padding-left: 5px;
	padding-right: 5px;
}
}
</style>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="brand" href="/admin/">Administration - pleep.net</a>
			<div class="nav-collapse collapse">
				<p class="navbar-text pull-right"> 
					<!--Logged in as <a href="#" class="navbar-link">Username</a>--> 
				</p>
				<ul class="nav">
					<li class="active"><a href="/admin/index.php">Module</a></li>
				</ul>
			</div>
			<!--/.nav-collapse --> 
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well sidebar-nav">
				<?php $modules->navigation(); ?>
			</div>
			<!--/.well --> 
		</div>
		<!--/span-->
		<div class="span9">
		<?php
		
		if (!empty($_GET['mod'])) {
			include(DIR. "/admin/modules/". $_GET['mod_file']);
		} else {
			?>
			<h2>Module</h2>
			<div class="alert alert-info">
				Bitte <strong>links</strong> ein Modul auswählen.
			</div>			
			<?php
		}
		
		?>
		</div>
		<!--/span--> 
	</div>
	<!--/row-->
	
	<hr>
	<footer>
		<p>&copy; pleep.net <?php echo date("Y"); ?></p>
	</footer>
</div>
<!--/.fluid-container-->
</body>
</html>